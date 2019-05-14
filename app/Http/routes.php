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
        Route::delete('/', 'CountryController@delete')->name('country.delete');
        Route::post('/sort', 'CountryController@sort')->name('country.sort');
        Route::get('/detail', 'CountryController@detail')->name('country_detail');
        Route::post('/detail', 'CountryController@saveDetail')->name('country_detail.save');
        Route::get('/visa_countries', 'CountryController@visaCountries')->name('visa_countries');
        Route::get('/select_countries', 'CountryController@selectCountries')->name('select_countries');
        Route::post('/save_select_country', 'CountryController@saveSelectCountry')->name('save_select_country');
        Route::get('/select_visa_countries', 'CountryController@selectVisaCountries')->name('select_visa_countries');
        Route::post('/visa_country', 'CountryController@saveVisaCountry')->name('save_visa_country');
        Route::delete('/visa_country', 'CountryController@deleteVisaCountry')->name('visa_country.delete');
        Route::get('/visa_country', 'CountryController@showVisaCountry')->name('visa_country.show');
    });
    //advantage

    Route::group(['prefix' => 'advantage'], function () {
        Route::get('/', 'AdvantageController@index')->name('advantage.index');
        Route::get('/create', 'AdvantageController@create')->name('advantage.create');
        Route::post('/save', 'AdvantageController@save')->name('advantage.save');
        Route::get('/edit', 'AdvantageController@edit')->name('advantage.edit');
        Route::delete('/delete', 'AdvantageController@delete')->name('advantage.delete');
    });

    //适用群体
    Route::group(['prefix' => 'user_type'], function () {
        Route::get('/', 'UserTypeController@index')->name('user_type.index');
        Route::get('/create', 'UserTypeController@create')->name('user_type.create');
        Route::post('/save', 'UserTypeController@save')->name('user_type.save');
        Route::get('/edit', 'UserTypeController@edit')->name('user_type.edit');
        Route::delete('/delete', 'UserTypeController@delete')->name('user_type.delete');
    });


    //申请条件
    Route::group(['prefix' => 'apply_condition'], function () {
        Route::get('/', 'ApplyConditionController@index')->name('apply_condition.index');
        Route::get('/create', 'ApplyConditionController@create')->name('apply_condition.create');
        Route::post('/save', 'ApplyConditionController@save')->name('apply_condition.save');
        Route::get('/edit', 'ApplyConditionController@edit')->name('apply_condition.edit');
        Route::delete('/delete', 'ApplyConditionController@delete')->name('apply_condition.delete');
    });

});


//文件上传
Route::group(['prefix' => 'upload', 'namespace' => 'Common'], function () {
    Route::post('/', 'UploadController@uploadToLocalStore')->name('upload');
});


Route::group(['prefix' => 'customers', 'namespace' => 'Customer', 'middleware' => ['auth']], function () {
    Route::get('/', 'CustomerController@index');
});





