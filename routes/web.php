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

Route::get('/','UserController@index');
Route::post('/','UserController@index');
Route::post('/user/update','UserController@update');//更新
Route::get('/rand','UserController@rand');//随机数
Route::get('/send','UserController@send');//发送短信
Route::post('/user/destroy','UserController@destroy');//删除