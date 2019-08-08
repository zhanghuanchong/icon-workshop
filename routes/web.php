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

Route::get('/', 'HomeController@index');
Route::get('/changelog', 'HomeController@changeLog');
Route::get('/guide/{platform}', 'HomeController@guide');
Route::get('/icon', 'HomeController@icon');
Route::get('/icon/{id}', 'HomeController@iconWithID');
Route::get('/about', 'HomeController@about');
Route::get('/faq', 'HomeController@faq');
Route::get('/splash', 'SplashController@index');

Route::post('/icon/upload', 'IconController@postUpload');
Route::post('/icon/generate', 'IconController@postGenerate');
Route::get('/icon/detail', 'IconController@getDetail');
Route::get('/icon/api-detail/{id}', 'IconController@getApiDetail');
Route::get('/icon/api-generate/{id}', 'IconController@getApiGenerate');
Route::get('/icon/download/{id}', 'IconController@getDownload');
Route::post('/icon/post-subscribe', 'IconController@postSubscribe');
Route::get('/admin', 'AdminController@getIndex');
Route::get('/admin/verify-code', 'AdminController@getVerifyCode');
Route::post('/admin/login', 'AdminController@postLogin');

Route::get('/job/delete-expired-design-files', 'JobController@deleteExpiredDesignFiles');
Route::get('/job/delete-expired-design-caches', 'JobController@deleteExpiredDesignCaches');
Route::get('/job/delete-expired-splash-files', 'JobController@deleteExpiredSplashFiles');
Route::get('/job/delete-expired-splash-caches', 'JobController@deleteExpiredSplashCaches');
Route::get('/job/remove-old-splash-files', 'JobController@removeOldSplashFiles');
Route::get('/job/remove-magick-tmp', 'JobController@removeMagickTmp');

Route::get('/vote', 'VoteController@getIndex');
Route::post('/vote', 'VoteController@postIndex');

Route::post('/api/file/upload', 'CommonController@uploadFile');
Route::post('/api/splash/generate', 'SplashController@generate');

Route::get('/api/splash/regenerate/{uuid}', 'SplashController@regenerate');
Route::get('/splash/download/{uuid}', 'SplashController@download');
Route::get('/splash/demo', 'SplashController@demo');

Route::get('/dev/my-ip', 'DevController@myIp');
