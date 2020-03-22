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
    Route::get('/country/{id}', 'HomeController@getCountryInfo')->name('country_info');
    Route::get('/passportsInfo', 'HomeController@getPassportsInfo')->name('passportsInfo');
    Route::get('/countries', 'HomeController@getRecommendCountries')->name('passport_info');
    Route::get('/newsList', 'HomeController@getNewsList')->name('home.newsList');
    Route::get('/news', 'HomeController@getNews')->name('home.news');
    Route::get('/recommend_news_list', 'HomeController@getRecommendNews')->name('home.recommend_news_list');

});
