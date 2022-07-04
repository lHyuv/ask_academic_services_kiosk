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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index'])->name('guest');

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('guest2');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/backlogs', [App\Http\Controllers\HomeController::class, 'backlog']);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'view_profile']);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user_crud']);

Route::get('/role', [App\Http\Controllers\HomeController::class, 'role_crud']);

Route::get('/requests', [App\Http\Controllers\HomeController::class, 'request_crud']);

Route::get('/steps', [App\Http\Controllers\HomeController::class, 'step_crud']);

Route::get('/requirements', [App\Http\Controllers\HomeController::class, 'requirement_crud']);

Route::get('/user_role', [App\Http\Controllers\HomeController::class, 'user_role_crud']);