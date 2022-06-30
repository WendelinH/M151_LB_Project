<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () {
    return redirect('/artikel');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/artikel', App\Http\Controllers\ArtikelController::class);
Route::resource('/kunde', App\Http\Controllers\KundeController::class);
Route::resource('/warenkorb_artikel', App\Http\Controllers\WarenkorbArtikelController::class);

Route::get('/danke', function () {
    return view('danke');
});
