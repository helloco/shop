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

//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::get('/' ,'HomeController@index');
Route::get('/home' ,'HomeController@index');

Route::POST('login' ,'HomeController@login');
Route::POST('register' ,'HomeController@register');
Route::POST('post' ,'UserController@post');
Route::POST('addComment' ,'UserController@addComment');

Route::get('t/{id}' ,'HomeController@postDetail');


Route::get('postView' ,'HomeController@postView');

Route::get('logout' ,'HomeController@logout');


Route::get('/admin' ,'SystemController@index');
Route::POST('deleteSubject' ,'SystemController@deleteSubject');
Route::POST('deleteReply' ,'SystemController@deleteReply');

Route::get('i' ,'UserController@index');

Route::POST('alterPwd' ,'UserController@alterPwd');

