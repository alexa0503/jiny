<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->trashed == 'y'){
            $rows = Page::withTrashed()->whereNotNull('deleted_at')->paginate(20);
        }
        else{
            $rows = Page::paginate(20);
        }

        return response($rows);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Page $request)
    {
        $data = $request->only(['title', 'desc', 'body', 'alias','sort_id','menu_display']);
        Page::create($data);
        return response(['ret'=>0],200);
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
        $row = Page::find($id);
        return response($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Page $request, $id)
    {
        $data = $request->only(['title', 'desc', 'body', 'alias','sort_id','menu_display']);
        Page::where('id', $id)->update($data);
        return response(['ret'=>0],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::withTrashed()
                ->where('id', $id)
                ->first();
        if( $page->deleted_at == null ){
            $page->delete();
        }
        else{
            $page->restore();
        }
        return response([]);
    }
}
