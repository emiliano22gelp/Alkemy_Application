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

Route::post('/me/app/api', 'ApplicationController@save');  // API llamada por ajax para agregar una aplicacion al carrito del usuario

Route::get('/me/app/api', function(){   //controla que el cliente no ingrese a la API anterior por GET cuando en realidad es por POST
	return redirect()->route('index');
});

Route::get('/me/myShoppingCart', 'ApplicationController@myShoppingCart')->name('myShoppingCart');

Route::post('/me/app/buy', 'ApplicationController@buy');     // API llamada por ajax para comprar una aplicacion almacenada en el carrito

Route::get('/me/app/buy', function(){     //controla que el cliente no ingrese a la API anterior por GET cuando en realidad es por POST                 
	return redirect()->route('index');
});

Route::delete('me/app/remove/{id}', 'ApplicationController@remove_cart'); //API llamada por ajax para eliminar una aplicacion del carrito del usuario logueado

Route::get('me/app/remove/{id}', function(){  //controla que el cliente no ingrese a la API anterior por GET cuando en realidad es por DELETE
	return redirect()->route('index');
});

Route::delete('me/app/cancel/{id}', 'ApplicationController@cancel_cart'); //API llamada por ajax para cancelar la compra de una aplicacion del usuario logueado

Route::get('me/app/cancel/{id}', function(){  //controla que el cliente no ingrese a la API anterior por GET cuando en realidad es por DELETE
	return redirect()->route('index');
});

Route::get('/visitCategories', 'VisitApplicationController@visitCategories')->name('visitCategories');

Route::get('/visitApps/{id}', 'VisitApplicationController@visitApps')->name('visitApps');

Route::get('/visitDetailApp/{id}', 'VisitApplicationController@visit_Detail_App')->name('visitDetailApp');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
