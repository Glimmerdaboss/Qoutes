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



Route::group(['Middleware' => 'webb'], function() {
	Route::get('/{author?}', [
		'uses'=>'QuoteController@getIndex',
		'as'=>'index'
		// QuoteController@getIndex : QuoteController = Controller, and in the controller, there is a method called getIndex
	]);

	Route::post('/new', [
		'uses'=>'QuoteController@postQuote', 
				'as'=>'create'
	// QuoteController@postQuote : QuoteController = Controller, and in the controller, there is a method called postQuote			
		]);
	Route::get('/delete/{quote_id}', [

		'uses'=>'QuoteController@getDeleteQuote',
		'as'=>'delete'
		// QuoteController@getDeleteQuote : QuoteController = Controller, and in the controller, there is a method called getDeleteQuote		
		]);
	Route::get('/gotemail/{author_name}',[
		'uses'=>'QuoteController@getMailCallBack',
		'as'=>'mail_callback'
		]);

	Route::get('/admin/login',[
		'uses'=>'AdminController@getLogIn',
		'as'=>'admin.login'
		]);

	Route::post('/admin/login',[
		'uses'=>'AdminController@postLogIn',
		'as'=>'admin.login'
		]);

	Route::get('/admin/dashboard',[
		'uses'=>'AdminController@getDashBoard',
		'middleware'=>'auth',
		'as'=>'admin.dashboard'
		]);

	Route::get('/admin/logout',[
		'uses'=>'AdminController@getLogOut',
		'as'=>'admin.logout'
		]);
});