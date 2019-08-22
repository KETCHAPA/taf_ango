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

Route::resource('vehicles', 'VehiclesController');

Route::get('vehicles/{id}/louer', "LocationsController@locationForm")->name("vehicles.addLocation");
Route::post('vehicles/louer', "LocationsController@store")->name("vehicles.storeLocation");

Route::get("locations/{id}/edit", "LocationsController@edit")->name("locations.edit");
Route::post("/locations/{id}/cancel", "LocationsController@cancel")->name("locations.cancel");

Route::put("locations/{id}/edit", "LocationsController@update")->name("vehicles.updateLocation");
/*Route::get('users/{id}', function ($id) {

});*/
