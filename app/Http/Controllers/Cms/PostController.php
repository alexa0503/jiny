<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = \App\Post::orderby('sort_id', 'ASC')->paginate(20);
        return view('cms.post.index', [
            'rows' => $rows,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = \App\Category::all();
        return view('cms.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\PostRequest $request)
    {
        try {
            $post = new \App\Post();
            $post->title = $request->input('title');
            $post->desc = $request->input('desc') ?: '';
            $post->thumb = $request->input('thumb') ?: '';
            $post->body = $request->input('body');
            $post->sort_id = $request->input('sort_id');
            $post->save();
            return response([]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        $post = \App\Post::find($id);
        return view('cms.post.edit', [
           'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\PostRequest $request, $id)
    {
        $post = \App\Post::find($id);
        $post->title = $request->input('title');
        $post->desc = $request->input('desc') ?: '';
        $post->thumb = $request->input('thumb') ?: '';
        $post->body = $request->input('body');
        $post->sort_id = $request->input('sort_id');
        $post->save();
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
        \App\Post::destroy($id);
        return response(['ret'=>0]);
    }
}
