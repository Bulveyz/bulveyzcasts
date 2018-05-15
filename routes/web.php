<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/get/category', 'CastController@search');
    Route::resource('cast', 'CastController');
    Route::post('episode/store', 'EpisodeController@store');
    Route::get('episode/{episode}', 'EpisodeController@show');
    Route::get('catalog', 'CatalogController@index');
    Route::resource('discussion', 'DiscussionController');
    Route::get('/blog/{article}', 'BlogController@show');
    Route::post('/blog/comment', 'BlogController@commentStore');
    Route::resource('blog', 'BlogController');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/profile', 'UserController@profile');
        Route::get('user/noty', 'UserController@notification');
        Route::post('/episodes/newcomment', 'CommentEpisodeController@store');
        Route::get('/episode/{id}/delete', 'EpisodeController@destroy')->where('id', '[0-9]+');;
        Route::get('/episode/comment/{id}/delete', 'CommentEpisodeController@destroy')->where('id', '[0-9]+');
        Route::get('admin/dashboard', 'AdminController@dashboard');
        Route::get('/cast/{cast}/delete', 'CastController@destroy');
        Route::resource('answer', 'AnswerController');
    });



    Route::get('/', 'HomeController@index');
});
