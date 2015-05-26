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

Route::pattern('id', '[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', ['as' => 'categories' , 'uses' => 'CategoriesController@index']);
    Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('/create', ['as' => 'categories.create' , 'uses' => 'CategoriesController@create']);
    Route::get('/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
});

Route::group(['prefix' => 'products'], function() {
    Route::get('/', ['as' => 'products' , 'uses' => 'ProductsController@index']);
    Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
    Route::get('/create', ['as' => 'products.create' , 'uses' => 'ProductsController@create']);
    Route::get('/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
