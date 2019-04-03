<?php

use Illuminate\Http\Request;


Route::prefix('v1')->group(function () {

	Route::post('signup', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

	//Routes for Category publics
	Route::get('category', 'Api\CategoryApiController@index');
	Route::get('category/{category}', 'Api\CategoryApiController@show');

	//Routes for Product publics
	Route::get('product', 'Api\ProductApiController@index');
	Route::get('product/{product}', 'Api\ProductApiController@show');
	Route::get('category/{category}/product/', 'Api\ProductApiController@getForCategory');

	Route::group(['middleware' => 'jwt.auth'], function(){

	  	Route::get('auth/user', 'AuthController@user');
	  	Route::post('auth/logout', 'AuthController@logout');

	  	Route::post('order', 'Api\OrderApiController@store');
	  	Route::get('order', 'Api\OrderApiController@index');
	  	Route::get('order/{order}', 'Api\OrderApiController@show');
	  	Route::delete('order/{order}', 'Api\OrderApiController@delete');
	  	Route::get('orderbyuser', 'Api\OrderApiController@orderbyuser');
	  	//Route::put('order/{order}', 'Api\OrderApiController@update');
	  	//Route::delete('order/{order}', 'Api\OrderApiController@delete');
	
	});

});