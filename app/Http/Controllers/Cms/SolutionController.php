<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests\Solution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = \App\Solution::orderby('sort_id', 'ASC');
        if( null != $request->category ){
            $model->where('category_id', $request->category);
        }
        $rows = $model->paginate(20);
        return view('cms.solution.index', [
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
        $categories = \App\SolutionCategory::all();
        return view('cms.solution.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Solution $request)
    {
        $solution = new \App\Solution();
        $solution->category_id = $request->input('category');
        $solution->name = $request->input('name');
        $solution->sort_id = $request->input('sort_id');
        $solution->desc = $request->input('desc');
        $solution->image = $request->input('image');
        //$solution->attachment = $request->input('attachment');
        $solution->body = $request->input('body') ?: '';
        $videos = [];
        if( $request->input('videos') && is_array($request->input('videos')) ){
            foreach($request->input('videos') as $video){
                if( isset($video['url']) || isset($video['title']) ){
                    $videos[] = $video;
                }
            }
        }
        $solution->videos = $videos;
        $solution->save();
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
        $solution = \App\Solution::find($id);
        $categories = \App\SolutionCategory::all();
        return view('cms.solution.edit', [
           'solution' => $solution,
           'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Solution $request, $id)
    {
        $solution = \App\Solution::find($id);
        $solution->category_id = $request->input('category');
        $solution->name = $request->input('name');
        $solution->sort_id = $request->input('sort_id');
        $solution->desc = $request->input('desc');
        $solution->image = $request->input('image');
        //$solution->attachment = $request->input('attachment');
        $solution->body = $request->input('body') ?: '';
        $videos = [];
        if( $request->input('videos') && is_array($request->input('videos')) ){
            foreach($request->input('videos') as $video){
                if( isset($video['url']) || isset($video['title']) ){
                    $videos[] = $video;
                }
            }
        }
        $solution->videos = $videos;
        $solution->save();
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
        \App\Solution::destroy($id);
        return response(['ret'=>0]);
    }
}
