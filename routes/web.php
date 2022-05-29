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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/request_service_home', [App\Http\Controllers\HomeController::class, 'request_service_home']);

Route::get('/backlogs', [App\Http\Controllers\HomeController::class, 'backlog']);

Route::get('/pending_services', [App\Http\Controllers\HomeController::class, 'pending_services']);

Route::get('/request_service', [App\Http\Controllers\HomeController::class, 'request_service']);

Route::get('/overload_form', [App\Http\Controllers\HomeController::class, 'overload_form']);