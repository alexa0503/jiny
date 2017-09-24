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

Route::get('/', function () {
    return redirect(url('/v'));
    //return view('index');
});
Route::get('/v/{vue_capture?}', 'IndexController@index')->where('vue_capture', '[\/\w\.-]*');


Route::group(['middleware' => ['role:superadmin,global privileges'], 'prefix' => 'admin'], function () {
    Route::get('/', function(){
        return redirect('/admin/dashboard');
    });
    Route::group(['prefix'=>'api'], function(){
        Route::resource('page', 'Admin\PageController');
        Route::resource('block', 'Admin\BlockController');
        Route::resource('block.content', 'Admin\ContentController');
        Route::resource('block.field', 'Admin\FieldController');
        Route::get('profile', 'Admin\ProfileController@index');
        Route::put('profile', 'Admin\ProfileController@update');
    });
    Route::get('/{vue_capture?}', 'Admin\IndexController@index')->where('vue_capture', '[\/\w\.-]*');

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
