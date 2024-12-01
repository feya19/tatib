<?php

use Core\Route;

// Define your application routes
Route::get('', 'HomeController@index'); // Home page
Route::get('pdf', 'HomeController@pdf'); // PDF generation
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@authenticate');
Route::get('panduan', 'PanduanController@index'); //Panduan Tata Tertib
// Dispatch the route
Route::dispatch();
