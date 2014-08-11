<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
  'uses' => 'HomeController@start',
  'as' => 'front',
]);

Route::get('api/login', [
  'uses' => 'UserController@check',
  'as' => 'api.user.check',
]);

Route::post('api/login', [
  'uses' => 'UserController@login',
  'as' => 'api.user.login',
]);

Route::group(['prefix' => 'api', 'before' => 'auth'], function() {

  Route::get('authors', [
    'uses' => 'UserController@index',
    'as' => 'user.index',
  ]);

  Route::get('categories', [
    'uses' => 'CategoryController@index',
    'as' => 'category.index'
  ]);

  Route::get('activities', [
    'uses' => 'ActivityController@index',
    'as' => 'activity.index',
  ]);

  Route::post('activities', [
    'uses' => 'ActivityController@create',
    'as' => 'activity.create',
  ]);

  Route::delete('activities/{id}', [
    'uses' => 'ActivityController@delete',
    'as' => 'activity.delete',
  ]);

  Route::post('logout', [
    'uses' => 'UserController@logout',
    'as' => 'api.user.logout',
  ]);

});
