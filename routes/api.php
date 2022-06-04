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
use App\Http\Controllers\RoleController;

Route::get('/roles', [RoleController::class,'index']);

Route::get('/roles/active', [RoleController::class,'show_active']);

Route::post('/roles', [RoleController::class,'create']);

Route::post('/roles/update/{id}', [RoleController::class,'update']);

Route::post('/roles/delete/{id}', [RoleController::class,'delete']);

Route::get('/roles/{id}', [RoleController::class,'show']);

//Auth
use App\Http\Controllers\AuthController;

Route::post('/custom_auth/login', [AuthController::class, 'login']);
Route::post('/custom_auth/register', [AuthController::class, 'register']);
Route::post('/custom_auth/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/custom_auth/test', [AuthController::class, 'test']);

//Requests
use App\Http\Controllers\RequestController;

Route::middleware('auth:sanctum')->get('/requests', [RequestController::class, 'index']);

Route::middleware('auth:sanctum')->get('/requests/show_active', [RequestController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/requests/{id}', [RequestController::class, 'show']);

Route::middleware('auth:sanctum')->post('/requests',[RequestController::class, 'create']);

Route::middleware('auth:sanctum')->post('/requests/update/{id}', [RequestController::class, 'update']);

Route::middleware('auth:sanctum')->post('/requests/delete/{id}', [RequestController::class, 'delete']);

//Requests
use App\Http\Controllers\RequirementController;

Route::middleware('auth:sanctum')->get('/requirements', [RequirementController::class, 'index']);

Route::middleware('auth:sanctum')->get('/requirements/show_active', [RequirementController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/requirements/{id}', [RequirementController::class, 'show']);

Route::middleware('auth:sanctum')->post('/requirements',[RequirementController::class, 'create']);

Route::middleware('auth:sanctum')->post('/requirements/update/{id}', [RequirementController::class, 'update']);

Route::middleware('auth:sanctum')->post('/requirements/delete/{id}', [RequirementController::class, 'delete']);

//Steps
use App\Http\Controllers\StepController;

Route::middleware('auth:sanctum')->get('/steps', [StepController::class, 'index']);

Route::middleware('auth:sanctum')->get('/steps/show_active', [StepController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/steps/{id}', [StepController::class, 'show']);

Route::middleware('auth:sanctum')->post('/steps',[StepController::class, 'create']);

Route::middleware('auth:sanctum')->post('/steps/update/{id}', [StepController::class, 'update']);

Route::middleware('auth:sanctum')->post('/steps/delete/{id}', [StepController::class, 'delete']);

Route::middleware('auth:sanctum')->post('/steps/complete/{id}', [StepController::class, 'complete_step']);