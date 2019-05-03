<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('base-config.banner.index');
});

//用户认证
Route::group(['prefix'=>'auth','middleware'=>[]],function()
{
    Route::get('login', 'Auth\AuthController@login');
});


//基础设置
Route::group(['prefix'=>'base-config','middleware'=>['auth']],function()
{
    //banner设置
    Route::resource('banner', 'BaseConfig\BannerController');

});