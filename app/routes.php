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

Route::get('/ ' ,'HomeController@login');
Route::get('/home/{name?} ' ,'HomeController@login');
Route::resource('postLogin' , 'HomeController@postLogin');
//Route::resource('login' , 'HomeController@login');
//Route::resource('/' , 'HomeController@login');
Route::resource('fuck' , 'HomeController@fuck');

Route::get('system ' ,'SystemController@index');
Route::get('system/addUser' ,'SystemController@index');
Route::get('system/viewOrder' ,'SystemController@viewOrder');
Route::get('system/delete' ,'SystemController@viewOrder');

Route::POST('addUser', 'SystemController@addUser');
Route::POST('system/deleteOrder', 'SystemController@deleteOrder');
Route::POST('system/passOrder', 'SystemController@passOrder');
Route::POST('system/rejectOrder', 'SystemController@rejectOrder');

Route::get('rept' , 'ReptController@index');
Route::POST('addProduct' , 'ReptController@addProduct');
Route::get('rept/viewProduct' , 'ReptController@viewProduct');
Route::get('rept/viewOrder' , 'ReptController@viewOrder');

Route::get('rept/addApplyView' , 'ReptController@addApplyView');
Route::resource('rept/addApply' , 'ReptController@addApply');