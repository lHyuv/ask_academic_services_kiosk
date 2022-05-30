<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*-----------Custom API Routes-----------------*/ 

//User
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class,'index']);

Route::get('/users/active', [UserController::class,'show_active']);

Route::post('/users', [UserController::class,'create']);

Route::post('/users/update/{id}', [UserController::class,'update']);

Route::post('/users/delete/{id}', [UserController::class,'delete']);

Route::get('/users/{id}', [UserController::class,'show']);

//User Type
use App\Http\Controllers\UserTypeController;

Route::get('/roles', [UserTypeController::class,'index']);

Route::get('/roles/active', [UserTypeController::class,'show_active']);

Route::post('/roles', [UserTypeController::class,'create']);

Route::post('/roles/update/{id}', [UserTypeController::class,'update']);

Route::post('/roles/delete/{id}', [UserTypeController::class,'delete']);

Route::get('/roles/{id}', [UserTypeController::class,'show']);