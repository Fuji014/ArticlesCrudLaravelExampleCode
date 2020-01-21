<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// articles modules

Route::get('/','ArticleController@welcome');
Route::get('/Article/show/{id}','ArticleController@show');
Route::get('/Article/create','ArticleController@create');
Route::get('/Article/{id}/edit','ArticleController@edit');
Route::patch('/Article/{id}', 'ArticleController@update');
Route::get('/Article/{id}', 'ArticleController@destroy');
Route::post('/','ArticleController@store');

Route::get('/Article/{id}/tryEdit', 'ArticleController@tryEdit');
Route::POST('/Article/{id}/tryUpdate', 'ArticleController@tryUpdate');

// a