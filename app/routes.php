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


Route::get('system ' ,'SystemController@index');
Route::get('system/addUser' ,'SystemController@index');
Route::get('system/viewUser' ,'SystemController@viewUser');
Route::get('system/viewOrder' ,'SystemController@viewOrder');
Route::get('system/delete' ,'SystemController@viewOrder');
Route::get('system/addShopView' ,'SystemController@addShopView');
Route::POST('system/addShop' ,'SystemController@addShop');
Route::get('system/viewShop' ,'SystemController@viewShop');

Route::POST('system/addUserInfo', 'SystemController@addUser');
Route::POST('system/deleteUser', 'SystemController@deleteUser');
Route::POST('system/deleteOrder', 'SystemController@deleteOrder');
Route::POST('system/passOrder', 'SystemController@passOrder');
Route::POST('system/rejectOrder', 'SystemController@rejectOrder');
Route::POST('system/deleteShop', 'SystemController@deleteShop');
Route::POST('system/updateShopInfo', 'SystemController@updateShopInfo');

Route::get('rept' , 'ReptController@index');
Route::POST('addProduct' , 'ReptController@addProduct');
Route::get('rept/viewProduct' , 'ReptController@viewProduct');
Route::get('rept/viewOrder' , 'ReptController@viewOrder');

Route::get('rept/addApplyView' , 'ReptController@addApplyView');
Route::resource('rept/addApply' , 'ReptController@addApply');


// Route::resource('shop' , 'ShopController@index');    // resource shop  此条可以完全匹配URL 可用在后期的优化中
Route::get('shopindex' , 'ShopController@viewProduct');
Route::resource('shop/addApply' , 'ShopController@addApply');
Route::get('shop/addApplyView' , 'ShopController@index');
Route::get('shop/viewOrder' , 'ShopController@viewOrder');
Route::get('shop/viewProduct' , 'ShopController@viewProduct');