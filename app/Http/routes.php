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

Route::group(['middleware' => ['web']], function () {
    //Authentication routes
    Route::auth();
    Route::get('/', 'HomeController@index');
	Route::get('/vehicles', 'VehicleController@index');    
    Route::get('/vehicle/create', 'VehicleController@create');	
    Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit');
    Route::get('/vehicle/show/{vehicle}', 'VehicleController@show');
    Route::post('/vehicle/{vehicle}', 'VehicleController@update');
    Route::post('/vehicle', 'VehicleController@store');
	Route::delete('/vehicle/{vehicle}', 'VehicleController@destroy');
});

Route::group(['prefix' => '/api/v1','middleware'=>'auth.basic'], function()
{
    Route::resource('vehicle', 'ApiVehicleController' );
});
