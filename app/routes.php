<?php

use Core\Route;
use App\Middleware\AuthMiddleware;

// Define your application routes
Route::get('', 'HomeController@index'); // Home page
Route::get('pdf', 'HomeController@pdf'); // PDF generation
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@authenticate');
Route::get('logout', 'HomeController@logout');
Route::get('profil', 'HomeController@profil', AuthMiddleware::class);
Route::get('dashboard', 'DashboardController@index', AuthMiddleware::class);
Route::get('panduan', 'PanduanController@index', AuthMiddleware::class); //Panduan Tata Tertib
// Dispatch the route
Route::dispatch();
