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

Route::get('/', function () {
    return view('welcome');
});
//登录路由
Route::get('/admin/public/login','Admin\PublicController@login')->name('login');
Route::get('/admin/public/logout','Admin\PublicController@logout');
Route::post('/admin/public/checkLogin','Admin\PublicController@checkLogin');
Route::get('/admin/public/index','Admin\PublicController@index');//后台首页路由
Route::get('/admin/public/welcome','Admin\PublicController@welcome');//后台首页路由



//使用路由群组控制
Route::group(['middleware'=>'auth:admin'],function (){
    Route::get('/admin/public/index','Admin\PublicController@index');//后台首页路由
    Route::get('/admin/public/welcome','Admin\PublicController@welcome');//后台首页路由
    Route::any('/admin/admin/index','Admin\AdminController@index');//后台首页路由
    Route::get('/admin/admin/loadData','Admin\AdminController@loadData');//后台首页路由

});