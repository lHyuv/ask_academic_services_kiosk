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

Route::get('/ace_add_form', [App\Http\Controllers\HomeController::class, 'ace_add_form']);

Route::get('/ace_change_form', [App\Http\Controllers\HomeController::class, 'ace_change_form']);

Route::get('/completion_form', [App\Http\Controllers\HomeController::class, 'completion_form']);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'view_profile']);

Route::get('/ongoing_services', [App\Http\Controllers\HomeController::class, 'ongoing_services']);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user_crud']);

Route::get('/role', [App\Http\Controllers\HomeController::class, 'role_crud']);

Route::get('/requests', [App\Http\Controllers\HomeController::class, 'request_crud']);

Route::get('/steps', [App\Http\Controllers\HomeController::class, 'step_crud']);

Route::get('/requirements', [App\Http\Controllers\HomeController::class, 'requirement_crud']);