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

Route::get('/', 'WelcomeController@index');

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::get('create', ['as' => 'products-create', 'uses' => 'AdminProductsController@create']);
        Route::get('edit/{id}', ['as' => 'products-edit', 'uses' => 'AdminProductsController@edit']);
        Route::get('update/{id}', ['as' => 'products-update', 'uses' => 'AdminProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'products-destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('show/{id}', ['as' => 'products-show', 'uses' => 'AdminProductsController@show']);
        Route::get('store', ['as' => 'products-store', 'uses' => 'AdminProductsController@store']);
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('', 'AdminCategoriesController@index');
        Route::get('create', ['as' => 'categories-create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('edit/{id}', ['as' => 'categories-edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::get('update/{id}', ['as' => 'categories-update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'categories-destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('show/{id}', ['as' => 'categories-show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('store', ['as' => 'categories-store', 'uses' => 'AdminCategoriesController@store']);
    });
});


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
