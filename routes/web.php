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

Route::get('/me/options', 'ApplicationController@index')->name('index');

Route::get('/me/newApplication', 'ApplicationController@newApplication')->name('newApplication');

Route::post('/me/newApplication', 'ApplicationController@createApp')->name('createApp');

Route::get('/me/apps', 'ApplicationController@myApps')->name('myApps');

Route::get('/me/app/{id}', 'ApplicationController@application_detail')->name('application_detail');

Route::delete('/me/app/{id}', 'ApplicationController@delete_application')->name('delete_application');

Route::get('/me/editApplication/{id}', 'ApplicationController@editApplication')->name('editApplication');

Route::put('/me/editApplication/{id}', 'ApplicationController@updateApp')->name('updateApp');

Route::get('/allCategories', 'ApplicationController@allCategories')->name('allCategories');

Route::get('/apps/{id}', 'ApplicationController@apps')->name('apps');

Route::post('/me/app/api', 'ApplicationController@save');

Route::get('/me/app/api', function(){
	return redirect()->route('index');
});

Route::get('/me/myShoppingCart', 'ApplicationController@myShoppingCart')->name('myShoppingCart');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
