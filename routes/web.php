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
//    return view('welcome');//展示首页

    //Family 是别名
    app('Family')->getPersion();//方法一：用别名 获取对象,  需要提前 绑定到容器

//    app('App\Services\Family\FamilyService')->getPersion();////方法二： 对应 第三种绑定方式 不需要注册到容器中也可以调用(写类的路径)


});
//访问事件 触发监听事件 然后执行监听操作 打印信息
Route::get('/testEvents', 'TestController@testEvents')->name('testEvents');

//认证
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('test','TestController');//5 路由
