<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
//Route::post('/settings', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
Route::post('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
