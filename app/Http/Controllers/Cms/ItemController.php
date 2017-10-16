<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\ItemPost;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( null != $request->get('category')){
            //$rows = \App\Item::where()->paginate(20);
            $items = \App\ItemCategory::where('category_id', $request->get('category'))->get()->map(function($item){
                return $item->item_id;
            })->toArray();
            $rows = \App\Item::whereIn('id',$items)->paginate(20);
        }
        else{
            $rows = \App\Item::paginate(20);
        }

        return view('admin/item/index', [
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
        //var_dump(implode(',',array_keys(config('custom.templates'))));
        $categories = \App\Category::all();

        return view('admin/item/create', [
            'attributes' => config('custom.attributes'),
            'categories' => $categories,
            'templates' => config('custom.templates'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ItemPost $request)
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
        $thumbnail = '';
        if ($request->hasFile('thumbnail')) {
            if ($request->file('thumbnail')->getError() != 0) {
                return Response(['thumbnail' => $request->file('thumbnail')->getErrorMessage()], 422);
            }
            $file = $request->file('thumbnail');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $thumbnail = $path.$file_name;
        }
        DB::beginTransaction();
        try{
            $item = new \App\Item();
            $item->name = $request->input('name');
            $item->image = $image;
            $item->thumbnail = $thumbnail;
            $item->tmall_url = $request->input('tmall_url');
            $item->description = $request->input('description');
            $item->template = $request->input('template');
            $item->icon = $request->input('icon');
            $item->save();

            foreach(config('custom.attributes') as $name => $attribute){
                if(null != $request->input($name.'_title') || null != $request->input($name.'_content')){
                    $model = new \App\ItemAttribute;
                    $model->name = $name;
                    $model->title = $request->input($name.'_title');
                    $model->item_id = $item->id;
                    $model->content = $request->input($name.'_content');
                    $model->save();
                }
            }
            if( $request->input('categories')  && is_array($request->input('categories'))){
                foreach( $request->input('categories') as $category){
                    $model = new \App\ItemCategory;
                    $model->item_id = $item->id;
                    $model->category_id = $category;
                    $model->sort_id = 0;
                    $model->save();
                }
            }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return response(['thumbnail' => $e->getMessage()], 422);
        }
        return response([]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = \App\Item::find($id);
        $categories = \App\Category::all();

        return view('admin/item/edit', [
            'attributes' => config('custom.attributes'),
            'categories' => $categories,
            'templates' => config('custom.templates'),
            'item'=>$item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ItemPost $request, $id)
    {
        $item = \App\Item::find($id);
        $image = $item->image;
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
        $thumbnail = $item->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($request->file('thumbnail')->getError() != 0) {
                return Response(['thumbnail' => $request->file('thumbnail')->getErrorMessage()], 422);
            }
            $file = $request->file('thumbnail');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $thumbnail = $path.$file_name;
        }
        DB::beginTransaction();
        try{
            $item->name = $request->input('name');
            $item->image = $image;
            $item->thumbnail = $thumbnail;
            $item->tmall_url = $request->input('tmall_url');
            $item->description = $request->input('description');
            $item->template = $request->input('template');
            $item->icon = $request->input('icon');
            $item->save();

            \App\ItemAttribute::where('item_id',$item->id)->delete();
            foreach(config('custom.attributes') as $name => $attribute){
                if(null != $request->input($name.'_title') || null != $request->input($name.'_content')){
                    $model = new \App\ItemAttribute;
                    $model->name = $name;
                    $model->title = $request->input($name.'_title');
                    $model->item_id = $item->id;
                    $model->content = $request->input($name.'_content');
                    $model->save();
                }
            }
            if( $request->input('categories')  && is_array($request->input('categories'))){
                \App\ItemCategory::where('item_id',$item->id)->delete();
                foreach( $request->input('categories') as $category){
                    $model = new \App\ItemCategory;
                    $model->item_id = $item->id;
                    $model->category_id = $category;
                    $model->sort_id = 0;
                    $model->save();
                }
            }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return Response(['thumbnail' => $e->getMessage()], 422);
        }
        return response([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            \App\ItemCategory::where('item_id', $id)->delete();
            \App\ItemAttribute::where('item_id', $id)->delete();
            \App\Item::destroy($id);
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return Response(['ret'=>1001,'msg'=>$e->getMessage()]);
        }
        return response(['ret'=>0,'msg'=>'']);
    }
}
