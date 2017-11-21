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
            $rows = \App\Item::where('category_id',$request->get('category'))->paginate(20);
        }
        else{
            $rows = \App\Item::paginate(20);
        }

        return view('cms.item.index', [
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

        return view('cms.item.create', [
            'attributes' => config('custom.attributes'),
            'categories' => $categories,
            'templates' => config('custom.templates'),
            'options' => \App\Item::all(),
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

        DB::beginTransaction();
        try{
            $item = new \App\Item();
            $item->name = $request->input('name');
            $item->thumb = $request->input('thumb');
            $item->detail = $request->input('detail');
            $item->standard = $request->input('standard');
            $item->body = '';
            $item->category_id = $request->input('category');
            $item->cases = $request->input('cases');
            $item->options = $request->input('options') ? : [];
            $item->save();

            foreach(config('custom.attributes') as $name => $attribute){
                if(null != $request->input('attributes') && null != $request->input('attributes')[$name] ){
                    $model = new \App\ItemAttribute;
                    $model->name = $name;
                    $model->item_id = $item->id;
                    $model->body = $request->input('attributes')[$name];
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

        return view('cms.item.edit', [
            'attributes' => config('custom.attributes'),
            'categories' => $categories,
            'item'=>$item,
            'options' => \App\Item::all(),
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

        DB::beginTransaction();
        try{
            $item->name = $request->input('name');
            $item->thumb = $request->input('thumb');
            $item->detail = $request->input('detail');
            $item->standard = $request->input('standard');
            $item->body = '';
            $item->cases = $request->input('cases');
            $item->options = $request->input('options') ? : [];
            $item->category_id = $request->input('category');
            $item->save();

            \App\ItemAttribute::where('item_id',$item->id)->delete();
            foreach(config('custom.attributes') as $name => $attribute){
                if(null != $request->input('attributes') && null != $request->input('attributes')[$name] ){
                    $model = new \App\ItemAttribute;
                    $model->name = $name;
                    $model->item_id = $item->id;
                    $model->body = $request->input('attributes')[$name];
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
            \App\Category::where('item_id', $id)->delete();
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
