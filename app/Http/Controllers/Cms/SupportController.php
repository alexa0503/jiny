<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        $rows = \App\Support::where('type_id', $type)->orderby('sort_id', 'ASC')->paginate(20);
        return view('cms.support.index', [
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
        return view('cms.support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Support $request, $type_id)
    {
        try {
            $support = new \App\Support();
            $support->type_id = $type_id;
            $support->title = $request->input('title');
            $support->sort_id = $request->input('sort_id');
            $support->desc = $request->input('desc');
            $support->thumb = $request->input('thumb');
            $support->attachment = $request->input('attachment');
            $support->body = $request->input('body');
            $support->save();
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
        $support = \App\Support::find($id);
        return view('cms.support.edit', [
           'support' => $support,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Support $request,$type_id, $id)
    {
        $support = \App\Support::find($id);
        //$support->type_id = $request->input('category');
        $support->title = $request->input('title');
        $support->sort_id = $request->input('sort_id');
        $support->desc = $request->input('desc');
        $support->thumb = $request->input('thumb');
        $support->attachment = $request->input('attachment');
        $support->body = $request->input('body');
        //$support->body = '';
        $support->save();
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
        \App\Support::destroy($id);
        return response(['ret'=>0]);
    }
}
