<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request, $type)
    {
        $rows = \App\Page::orderBy('sort_id', 'ASC')->paginate(20);
        return view('cms.page.index', ['rows'=>$rows, 'type_id'=>$type, 'type_title'=>$this->type_titles[$type]]);
    }
    public function create(Request $request, $type)
    {
        return view('admin/page/create', ['type_id'=>$type]);
    }
    public function store(Request $request, $type)
    {
        if( $type == 3){
            $this->validate($request, [
                'title' => 'required|max:60',
                'description' => 'required|max:120',
                'sort_id' => 'required|max:11',
                'image' => 'mimes:jpeg,bmp,png',
            ]);
        }
        else{
            $this->validate($request, [
                'title' => 'required|max:60',
                'sort_id' => 'required|max:11',
                'image' => 'required|mimes:jpeg,bmp,png,gif',
            ]);
        }
        $image = null;
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
        $page = new \App\Page;
        $page->image = $image;
        $page->type_id = $type;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->content = $request->input('content');
        $page->sort_id = $request->input('sort_id');
        $page->save();
        return [];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {
        $row = \App\Page::find($id);
        return view('admin/page/edit', ['row'=>$row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {
        if( $type == 3){
            $this->validate($request, [
                'title' => 'required|max:60',
                'description' => 'required|max:120',
                'sort_id' => 'required|max:11',
                'image' => 'required|mimes:jpeg,bmp,png,gif',
            ]);
        }
        else{
            $this->validate($request, [
                'title' => 'required|max:60',
                'sort_id' => 'required|max:11',
                'image' => 'mimes:jpeg,bmp,png',
            ]);
        }
        $image = null;
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
        $page = \App\Page::find($id);
        //$page->type_id = $type;
        if( null != $image ){
            $page->image = $image;
        }
        $page->title = $request->input('title');
        if( null != $request->input('description') ){
            $page->description = $request->input('description');
        }
        if( null != $request->input('content') ){
            $page->content = $request->input('content');
        }

        $page->sort_id = $request->input('sort_id');
        $page->save();
        return [];
    }

    public function show($id)
    {
        return [];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type_id, $id)
    {
        $page = \App\Page::findOrFail($id);
        $page->delete();
        return ['ret'=>0];
    }
}
