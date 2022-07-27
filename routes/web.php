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

Route::get('/noscript', [App\Http\Controllers\GuestController::class, 'no_script']);

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

Route::get('/forms', [App\Http\Controllers\HomeController::class, 'form_crud']);

//requests

Route::get('/subject_tutorial', [App\Http\Controllers\HomeController::class, 'subject_tutorial']);
Route::get('/cross_enrollment', [App\Http\Controllers\HomeController::class, 'cross_enrollment']);
Route::get('/change_subject', [App\Http\Controllers\HomeController::class, 'change_subject']);
Route::get('/subject_petition', [App\Http\Controllers\HomeController::class, 'subject_petition']);
Route::get('/correction', [App\Http\Controllers\HomeController::class, 'correction']);
Route::get('/certification', [App\Http\Controllers\HomeController::class, 'certification']);
Route::get('/shifting', [App\Http\Controllers\HomeController::class, 'shifting']);
Route::get('/manual_enrollment', [App\Http\Controllers\HomeController::class, 'manual_enrollment']);
Route::get('/add_subject', [App\Http\Controllers\HomeController::class, 'add_subject']);
Route::get('/subject_overload', [App\Http\Controllers\HomeController::class, 'subject_overload']);

//

Route::get('/students', [App\Http\Controllers\HomeController::class, 'students']);
