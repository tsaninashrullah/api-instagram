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

Route::get('/', ['as' => 'default.api', 'uses' => 'HomeController@index']);
Route::get('/dashboard/chart', ['as' => 'dashboard.chart', 'uses' => 'HomeController@getChart']);
Route::get('instagram', ['as' => 'instagram.index', 'uses' => 'HomeController@instagramPage']);
Route::get('instagram/image', ['as' => 'instagram.image', 'uses' => 'HomeController@instagramImage']);
Route::get('instagram/video', ['as' => 'instagram.video', 'uses' => 'HomeController@instagramVideo']);
// Route::get('/', ['uses']);
