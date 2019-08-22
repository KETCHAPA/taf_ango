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