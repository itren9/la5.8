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

//引入_后台路由
include_once __DIR__.'/admin/web.php';


//前台路由
Route::get('/', function () {
//    return view('welcome');
    app('Family')->getPersion();//直接调用类
});
//认证
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('test','TestController');//5 路由
