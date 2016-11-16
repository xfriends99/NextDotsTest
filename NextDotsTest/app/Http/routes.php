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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'properties'], function () {
    Route::get('/', ['as' => 'properties.index', 'uses' => 'PropertyController@index']);
    Route::get('/create/', ['as' => 'properties.create', 'uses' => 'PropertyController@create']);
    Route::get('/edit/{id}', ['as' => 'properties.edit', 'uses' => 'PropertyController@edit']);
    Route::get('/destroy/{id}', ['as' => 'properties.destroy', 'uses' => 'PropertyController@destroy']);
    Route::post('/update/{id}', ['as' => 'properties.update', 'uses' => 'PropertyController@update']);
    Route::post('/store/', ['as' => 'properties.store', 'uses' => 'PropertyController@store']);
});

//Route::group('properties', 'PropertyController');
