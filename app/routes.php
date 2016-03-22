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

Route::get('/', 'HomeController@index');
Route::get('/changelog', 'HomeController@changeLog');
Route::get('/guide/{platform}', 'HomeController@guide');
Route::get('/icon/{id}', 'HomeController@icon');
Route::get('/about', 'HomeController@about');

Route::controller('icon', 'IconController');
Route::controller('admin', 'AdminController');