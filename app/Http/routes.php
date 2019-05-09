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
    return redirect()->route('home');
});


//dashboard
Route::group(['prefix'=>'home','middleware'=>['auth']],function()
{
    Route::get('/', 'Home\HomeController@index')->name('home');
});

//用户认证
Route::group(['prefix'=>'auth','middleware'=>[]],function()
{
    Route::get('login', 'Auth\AuthController@login');
    Route::post('post-login', 'Auth\AuthController@postLogin')->name('post-login');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');
});


//基础设置
Route::group(['prefix'=>'base-config', 'namespace' => 'BaseConfig', 'middleware'=>['auth', 'web']],function()
{
    //banner设置
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', 'BannerController@index')->name('banner');
        Route::get('/{id}', 'BannerController@edit')->name('banner.edit');
        Route::delete('/', 'BannerController@delete')->name('banner.delete');
        Route::get('/create', 'BannerController@create')->name('banner.create');
        Route::post('/store', 'BannerController@store')->name('banner.store');
    });

    Route::group(['prefix'=> 'country'], function () {
        Route::get('/', 'CountryController@index')->name('country');
        Route::get('/detail', 'CountryController@detail')->name('country_detail');
        Route::post('/detail', 'CountryController@saveDetail')->name('country_detail.save');
        Route::get('/passport', 'CountryController@passport')->name('passport');
    });

});


//文件上传
Route::group(['prefix' => 'upload', 'namespace' => 'Common'], function () {
    Route::post('/', 'UploadController@uploadToLocalStore')->name('upload');
});


Route::group(['prefix' => 'customers', 'namespace' => 'Customer', 'middleware' => ['auth']], function () {
    Route::get('/', 'CustomerController@index');
});





