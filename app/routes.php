<?php

use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\DosenMiddleware;
use App\Middleware\DpaMiddleware;
use App\Middleware\MahasiswaMiddleware;
use App\Middleware\SekjurMiddleware;
use Core\Route;

// Define your application routes
Route::get('', 'HomeController@index'); // Home page
Route::get('pdf', 'HomeController@pdf'); // PDF generation
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@authenticate');
Route::get('logout', 'HomeController@logout');
Route::get('profil', 'HomeController@profil', AuthMiddleware::class);
Route::get('dashboard', 'DashboardController@index', AuthMiddleware::class);
Route::get('panduan', 'PanduanController@index', AuthMiddleware::class); //Panduan Tata Tertib
Route::get('pelanggaran/detail/{id}', 'PelanggaranController@detail', AuthMiddleware::class);
Route::get('pelanggaran/proses/{id}', 'PelanggaranController@process', AuthMiddleware::class);
Route::post('pelanggaran/proses/{id}', 'PelanggaranController@processSubmit', AuthMiddleware::class);
Route::get('pelanggaran', 'PelanggaranController@index', MahasiswaMiddleware::class);
Route::get('pelaporan', 'PelaporanController@index', DosenMiddleware::class);
Route::get('pelaporan/tambah', 'PelaporanController@tambah', DosenMiddleware::class);
Route::post('pelaporan/tambah', 'PelaporanController@store', DosenMiddleware::class);
Route::get('verifikasi/kelas', 'VerifikasiController@kelas', DpaMiddleware::class);
Route::get('verifikasi/jurusan', 'VerifikasiController@jurusan', SekjurMiddleware::class);
Route::get('verifikasi/kelas/{id}/proses', 'VerifikasiController@prosesKelas', DpaMiddleware::class);
Route::get('verifikasi/jurusan/{id}/proses', 'VerifikasiController@prosesJurusan', SekjurMiddleware::class);
Route::post('verifikasi/kelas/{id}/proses', 'VerifikasiController@submitKelas', DpaMiddleware::class);
Route::post('verifikasi/jurusan/{id}/proses', 'VerifikasiController@submitJurusan', SekjurMiddleware::class);
Route::get('laporan/sekjur', 'LaporanController@sekjur', SekjurMiddleware::class);
Route::get('laporan', 'LaporanController@index', AdminMiddleware::class);
Route::get('data_user/mahasiswa', 'UserController@mahasiswa', AdminMiddleware::class);
Route::get('data_user/dosen', 'UserController@dosen', AdminMiddleware::class);
Route::get('data_tatib', 'TataTertibController@index', AdminMiddleware::class);
Route::get('detail', 'DetailController@index', AuthMiddleware::class);
Route::post('data_user/addMhs', 'UserController@addMahasiswa', AdminMiddleware::class);
Route::post('data_user/addDosen', 'UserController@addDosen', AdminMiddleware::class);
// Dispatch the route
Route::dispatch();
