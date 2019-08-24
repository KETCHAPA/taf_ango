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

Route::get('/', "HomeController@dashboard");

//Gestion des clients
Route::get('/employees', 'UserController@index');

//Gestion de la discipline
Route::resource('discipline', 'DisciplineController');
Route::post('presences', "DisciplineController@createPresence")->name("presences.store");

Route::resource('vehicles', 'VehiclesController');

Route::get('vehicles/{id}/louer', "LocationsController@locationForm")->name("vehicles.addLocation");
Route::post('vehicles/louer', "LocationsController@store")->name("vehicles.storeLocation");

Route::get("locations/{id}/edit", "LocationsController@edit")->name("locations.edit");
Route::post("/locations/{id}/cancel", "LocationsController@cancel")->name("locations.cancel");

Route::put("locations/{id}/edit", "LocationsController@update")->name("vehicles.updateLocation");

Route::resource('mails', 'MailsController');
Route::get("mail/{id}/send", "MailsController@send")->name("mails.send");
Route::get("mail/{id}/receive", "MailsController@receive")->name("mails.receive");

Route::get("planning/trips", "TripPlanningController@index");
Route::post("planning/storre", "TripPlanningController@store")->name("plannings.store");
Route::get('planning/{id}/cancel', "TripPlanningController@cancel")->name("planning.cancel");

Route::post('personnel/{id}/report', "DisciplineController@storeReport");
