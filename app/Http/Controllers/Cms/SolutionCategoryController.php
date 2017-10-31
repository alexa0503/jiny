<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests\SolutionCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolutionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = \App\SolutionCategory::orderby('sort_id', 'ASC')->paginate(20);
        return view('cms.solution_category.index', [
            'rows' => $rows,
            'categories' => \App\SolutionCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.solution_category.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionCategory $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            if ($request->file('image')->getError() != 0) {
                return Response(['image' => $request->file('image')->getErrorMessage()], 422);
            }
            $file = $request->file('image');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $image = $path.$file_name;
        }
        $thumb = '';
        if ($request->hasFile('thumb')) {
            if ($request->file('thumb')->getError() != 0) {
                return Response(['thumb' => $request->file('thumb')->getErrorMessage()], 422);
            }
            $file = $request->file('thumb');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $thumb = $path.$file_name;
        }
        $category = new \App\SolutionCategory();
        $category->name = $request->input('name');
        $category->sort_id = $request->input('sort_id');
        $category->desc = $request->input('desc');
        $category->image = $image;
        $category->thumb = $thumb;
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
        $category = \App\SolutionCategory::find($id);
        return view('cms.solution_category.edit', [
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
    public function update(SolutionCategory $request, $id)
    {
        $category = \App\SolutionCategory::find($id);
        $category->name = $request->input('name');
        $category->sort_id = $request->input('sort_id');
        $category->desc = $request->input('desc');
        if ($request->hasFile('image')) {
            if ($request->file('image')->getError() != 0) {
                return Response(['image' => $request->file('image')->getErrorMessage()], 422);
            }
            $file = $request->file('image');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $category->image = $path.$file_name;
        }
        if ($request->hasFile('thumb')) {
            if ($request->file('thumb')->getError() != 0) {
                return Response(['thumb' => $request->file('thumb')->getErrorMessage()], 422);
            }
            $file = $request->file('thumb');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $category->thumb = $path.$file_name;
        }
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
        $count = \App\Solution::where('category_id', $id)->count();
        if($count > 0){
            return response(['ret'=>1001,'msg'=>'抱歉，该分类下有产品~']);
        }
        else{
            \App\SolutionCategory::destroy($id);
            return response(['ret'=>0]);
        }
    }
}
