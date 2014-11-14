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

Route::get('/', function()
{
	return View::make('index');
});
Route::resource("find","ZonebussController");

Route::post('api/BBVA/find', 'APIBBVAController@find');
Route::resource("api/BBVA","APIBBVAController");


Route::post('api/Google/geocode','APIGoogleGeoController@geocode');
Route::resource("api/Google","APIGoogleGeoController");

Route::post('api/Foursquare/places', 'APIFoursquareController@places');
Route::resource("api/Foursquare","APIFoursquareController");





