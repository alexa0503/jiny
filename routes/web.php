<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        $categories = App\Category::orderBy('sort_id', 'ASC')->get();
        $page = App\Page::find(1);

        $items1 = App\Item::all();
        return view('index',[
          //'categories'=>$categories,
          'page' => $page,
          'items1' => $items1,
          'items2' => $items1,
        ]);
    });
    Route::get('/culture', function () {
        return view('culture');
    });
    Route::get('/contactus', function () {
        return view('contactus');
    });
    Route::get('/items/{id}', function ($id) {
        return view('items');
    })->name('items');
    Route::get('/item', function () {
        return view('item');
    });
    //解决方案
    Route::get('/solutions', function () {
        $categories = App\SolutionCategory::all();
        return view('solutions.index',[
            'categories'=>$categories,
        ]);
    });
    //解决方案列表
    Route::get('/solutions/{id}', function ($id) {
        $category = App\SolutionCategory::find($id);
        return view('solutions.list',[
            'category'=>$category,
        ]);
    })->name('solutions');
    //具体解决方案
    Route::get('/solution/{id}', function ($id) {
        $solution = App\Solution::find($id);
        return view('solutions.show',[
            'solution'=>$solution,
        ]);
    })->name('solution');
    //技术支持
    Route::get('supports', function(){
        $supports[0] = App\Support::where('type_id', 1)->get();
        $supports[1] = App\Support::where('type_id', 2)->get();
        return view('supports.index',['supports'=>$supports]);
    });
    Route::get('support/{id}', function($id){
        $support = App\Support::find($id);
        return view('supports.show',['support'=>$support]);
    })->name('support');
    //新闻
    Route::get('news', function(){
        $posts = App\Post::all();
        return view('news.index',['posts'=>$posts]);
    });
    Route::get('news/{id}', function($id){
        $post = App\Post::find($id);
        return view('news.show',['post'=>$post]);
    })->name('post');
});
//Route::get('/v/{vue_capture?}', 'IndexController@index')->where('vue_capture', '[\/\w\.-]*');


Route::group(['middleware' => ['role:superadmin,global privileges','web'], 'prefix' => 'cms'], function () {
    Route::get('/', function () {
        return redirect('/cms/dashboard');
    });
    Route::get('/dashboard', 'Cms\IndexController@index');
    Route::post('file/delete', 'Cms\FileController@delete');
    Route::post('file/upload/{name?}', 'Cms\FileController@upload');
    Route::resource('page.block', 'Cms\BlockController');
    Route::resource('item', 'Cms\ItemController');
    Route::resource('type.item', 'Cms\ItemTypeController');
    Route::resource('category', 'Cms\CategoryController');

    Route::get('users', 'Cms\IndexController@users');
    Route::get('account', 'Cms\IndexController@account');
    Route::post('account', 'Cms\IndexController@accountPost');
    //Route::resource('/work', 'Admin\WorkController');
    //Route::resource('/wechat/user', 'Admin\WechatUserController');
    //Route::get('/{vue_capture?}', 'Admin\IndexController@index')->where('vue_capture', '[\/\w\.-]*');
});


Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/install', function () {
    if (\App\User::count() == 0) {
        $role = Role::create(['name' => 'superadmin']);
        Permission::create(['name' => 'global privileges']);
        $role->givePermissionTo('global privileges');
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin@2017');
        $user->save();

        //$user = \App\User::find(1);
        $user->givePermissionTo('global privileges');
        $user->assignRole(['superadmin']);
        $user->roles()->pluck('name');
    }
    return redirect('/login');
});
