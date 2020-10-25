<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'StaticPagesController@home')->name('home');//主页
Route::get('/help', 'StaticPagesController@help')->name('help');//帮助页
Route::get('/about', 'StaticPagesController@about')->name('about');//关于页

Route::get('signup', 'UsersController@create')->name('signup');//注册
Route::resource('users', 'UsersController');//用户相关

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('sign/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');//用户点击激活连接，进入该路由

//重置密码逻辑
//重设密码页面
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//发送重设密码链接
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//重设跳转页面
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//通过token判断重设密码，更新用户重设的密码
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//微博
Route::resource('statuses','StatusesController', ['only'=>['store', 'destroy']]);
