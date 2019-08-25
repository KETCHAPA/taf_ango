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

//Home
Route::get('/', 'HomeController@login');
Route::post('/', 'HomeController@profile');
Route::get('/dashboard', "HomeController@dashboard");
Route::post('/search', 'HomeController@search');

//Gestion des clients
Route::get('/employees', 'UserController@index');

Route::get('/employee/show/{id}', 'UserController@show');
Route::get('/employee/create', 'UserController@create');
Route::post('/employee/store', 'UserController@store');
Route::get('/employee/edit/{id}', 'UserController@edit');
Route::post('/employee/update/{id}', 'UserController@update');
Route::post('/employee/destroy/{id}', 'UserController@destroy');

//Gestion des voyages
Route::get('/trips', 'TripController@index');
Route::get('/trip/show/{id}', 'TripController@show');
Route::get('/trip/create', 'TripController@create');
Route::post('/trip/store', 'TripController@store');
Route::get('/trip/edit/{id}', 'TripController@edit');
Route::post('/trip/update/{id}', 'TripController@update');
Route::post('/trip/destroy/{id}', 'TripController@destroy');

//Gestion des tickets
Route::get('/tickets/{id}', 'TicketController@index');
Route::get('/ticket/show/{id}', 'TicketController@show');
Route::get('/ticket/create/{id}', 'TicketController@create');
Route::post('/ticket/store/{id}', 'TicketController@store');
Route::get('/ticket/edit/{id}', 'TicketController@edit');
Route::post('/ticket/update/{id}', 'TicketController@update');
Route::get('/ticket/validate/{id}', 'TicketController@validation');
Route::get('/tickets/print/{id}', 'TicketController@printAllTickets');
Route::get('/ticket/print/{id}', 'TicketController@printTicket');
Route::post('/ticket/destroy/{id}', 'TicketController@destroy');

//Gestion des sinistres
Route::get('/sinisters', 'SinisterController@index');
Route::get('/sinister/show/{id}', 'SinisterController@show');
Route::get('/sinister/create', 'SinisterController@create');
Route::post('/sinister/store', 'SinisterController@store');
Route::post('/sinister/close/{id}', 'SinisterController@close');
Route::post('/sinister/destroy/{id}', 'SinisterController@destroy');

//Gestion des réservations
Route::get('/bookings', 'BookingController@index');
Route::get('/booking/show/{id}', 'BookingController@show');
Route::get('/booking/create', 'BookingController@create');
Route::post('/booking/store', 'BookingController@store');
Route::get('/booking/edit/{id}', 'BookingController@edit');
Route::post('/booking/update/{id}', 'BookingController@update');
Route::post('/booking/destroy/{id}', 'BookingController@destroy');
Route::post('/booking/confirm/{id}', 'BookingController@confirm');

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
Route::get('planning/print', "TripPlanningController@print")->name("planning.print");
