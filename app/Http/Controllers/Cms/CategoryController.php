<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = \App\Category::orderby('sort_id', 'ASC')->paginate(20);
        return view('cms.category.index', [
            'rows' => $rows,
            'categories' => \App\Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.category.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPost $request)
    {
        $category = new \App\Category();
        $category->name = $request->input('name');
        $category->sort_id = $request->input('sort_id');
        $category->save();
        return response([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\Category::find($id);
        return view('cms.category.edit', [
           'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPost $request, $id)
    {
        $category = \App\Category::find($id);
        $category->name = $request->input('name');
        $category->sort_id = $request->input('sort_id');
        $category->save();
        return response([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = \App\ItemCategory::where('category_id', $id)->count();
        if($count > 0){
            return response(['ret'=>1001,'msg'=>'抱歉，该分类下有产品~']);
        }
        else{
            \App\Category::destroy($id);
            return response(['ret'=>0]);
        }
    }
}
