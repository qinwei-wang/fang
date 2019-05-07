<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 19:08
 */


Route::group(['prefix' => 'v1'], function () {
    Route::get('/index', 'HomeController@index')->name('index');
    Route::post('/contact', 'HomeController@contact')->name('contact');

});