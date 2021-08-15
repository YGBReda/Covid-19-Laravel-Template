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

	Route::get('/', function () {
    return view('welcome');
	});

	Route::get('/fr', function () {
    return view('welcomefr');
	});

	Route::get('getdata', 'CoronaController@getDataCountry');
	Route::get('getalldata', 'CoronaController@getDataallCountry');
	Route::get('getdatabar', 'CoronaController@getDataBar');
	Route::get('getalldatastate', 'StateController@getDataallState');
	Route::get('getdatastate', 'StateController@getDataState');


	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth','admin']], function(){


	Route::get('corona', 'CoronaController@index');
	Route::get('corona/create', 'CoronaController@create');
	Route::post('corona/store', 'CoronaController@store');
	Route::get('corona/{id}/edit', 'CoronaController@edit');
	Route::put('corona/{id}', 'CoronaController@update');
	Route::delete('corona/{id}', 'CoronaController@destroy');


	Route::get('state', 'StateController@index');
	Route::get('state/create', 'StateController@create');
	Route::post('state/store', 'StateController@store');
	Route::get('state/{id}/edit', 'StateController@edit');
	Route::put('state/{id}', 'StateController@update');
	Route::delete('state/{id}', 'StateController@destroy');

	Route::get('total', 'TotController@index');
	Route::get('total/create', 'TotController@create');
	Route::post('total/store', 'TotController@store');
	Route::get('total/{id}/edit', 'TotController@edit');
	Route::put('total/{id}', 'TotController@update');
	


});