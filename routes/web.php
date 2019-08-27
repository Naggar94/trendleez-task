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

Route::get('/','Web\HomeController@index');
Route::post('/home/fetch','Web\HomeController@fetch');

Route::group(['middleware' => ['site']], function () {
	Route::get('/login','Web\AuthorizationController@index');
	Route::post('/login','Web\AuthorizationController@login');
	Route::get('/logout','Web\AuthorizationController@logout');
	Route::prefix('article')->group(function () {
		Route::get('/add','Web\ArticleController@add');
		Route::post('/add','Web\ArticleController@postAdd');
		Route::get('/view','Web\ArticleController@view');
		Route::get('/edit','Web\ArticleController@edit');
		Route::post('/edit','Web\ArticleController@postEdit');
		Route::post('/delete','Web\ArticleController@delete');
	});
});

