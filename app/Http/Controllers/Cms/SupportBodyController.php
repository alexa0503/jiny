<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests\SupportBody;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $support_id)
    {
        $support = \App\Support::find($support_id);
        $rows = \App\SupportBody::where('support_id', $support_id)->orderby('sort_id', 'ASC')->paginate(20);
        return view('cms.support.body.index', [
            'rows' => $rows,
            'support'=>$support,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($support_id)
    {
        $support = \App\Support::find($support_id);
        return view('cms.support.body.create', [
            'support' => $support
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportBody $request,$support_id)
    {
        $body = new \App\SupportBody();
        $body->support_id = $support_id;
        $body->title = $request->input('title');
        $body->sort_id = $request->input('sort_id');
        $body->image = $request->input('image');
        $body->txt = $request->input('txt');
        $body->save();
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
    public function edit($support_id,$id)
    {
        $body = \App\SupportBody::find($id);
        return view('cms.support.body.edit', [
           'body' => $body,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupportBody $request,$support_id, $id)
    {
        $body = \App\SupportBody::find($id);
        $body->title = $request->input('title');
        $body->sort_id = $request->input('sort_id');
        $body->image = $request->input('image');
        $body->txt = $request->input('txt');
        $body->save();
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
        \App\SupportBody::destroy($id);
        return response(['ret'=>0]);
    }
}
