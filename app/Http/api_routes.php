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
    Route::get('/ip', 'HomeController@getCountry')->name('home.getCountry');
    //sendEmail
    Route::post('/send_email', 'HomeController@sendEmail')->name('home.send_email');


    Route::get('/new_house/list', 'HomeController@getNewHouseList')->name('home.new_house');
    Route::get('/new_house/{id}', 'HomeController@getNewHouseDetail')->name('home.new_house.detail');
    Route::get('/recommend', 'HomeController@getNewHouseRecommend')->name('home.new_house.recommend');

    

    Route::get('/second_hand_house/list', 'HomeController@getSecondHandHouseList')->name('home.second_hand_house');
    Route::get('/second_hand_house/{id}', 'HomeController@getSecondHandHouseDetail')->name('home.second_hand_house.detail');
    Route::get('/rented_house/list', 'HomeController@getRentedHouseList')->name('home.second_hand_house');
    Route::get('/rented_house/{id}', 'HomeController@getRentedHouseDetail')->name('home.second_hand_house.detail');

    Route::get('/business/list', 'HomeController@getBusinessList')->name('home.second_hand_house');
    Route::get('/office/list', 'HomeController@getOfficeList')->name('home.second_hand_house.detail');
    Route::get('/retention/list', 'HomeController@getRetentionList')->name('home.second_hand_house');

    Route::get('/business/{id}', 'HomeController@getBusinessDetail')->name('home.second_hand_house.detail');

    Route::post('/search', 'HomeController@search')->name('home.search');
    Route::post('/upload', 'HomeController@upload')->name('home.upload');








});
