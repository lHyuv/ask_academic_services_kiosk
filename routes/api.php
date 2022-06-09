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

//Clients
use App\Http\Controllers\ClientController;

Route::middleware('auth:sanctum')->get('/clients', [ClientController::class, 'index']);

Route::middleware('auth:sanctum')->get('/clients/show_active', [ClientController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/clients/user/{id}', [ClientController::class, 'find_by_user']);

Route::middleware('auth:sanctum')->get('/clients/{id}', [ClientController::class, 'show']);

Route::middleware('auth:sanctum')->post('/clients',[ClientController::class, 'create']);

Route::middleware('auth:sanctum')->post('/clients/update/{id}', [ClientController::class, 'update']);

Route::middleware('auth:sanctum')->post('/clients/delete/{id}', [ClientController::class, 'delete']);

//submitted_requests
use App\Http\Controllers\SubmittedRequestController;

Route::middleware('auth:sanctum')->get('/submitted_requests', [SubmittedRequestController::class, 'index']);

Route::middleware('auth:sanctum')->get('/submitted_requests/show_active', [SubmittedRequestController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/submitted_requests/user/{id}', [SubmittedRequestController::class, 'find_by_user']);

Route::middleware('auth:sanctum')->get('/submitted_requests/{id}', [SubmittedRequestController::class, 'show']);

Route::middleware('auth:sanctum')->post('/submitted_requests',[SubmittedRequestController::class, 'create']);

Route::middleware('auth:sanctum')->post('/submitted_requests/update/{id}', [SubmittedRequestController::class, 'update']);

Route::middleware('auth:sanctum')->post('/submitted_requests/delete/{id}', [SubmittedRequestController::class, 'delete']);

//statuses

Route::middleware('auth:sanctum')->post('/submitted_requests/approve_request/{id}', [SubmittedRequestController::class, 'approve_request']);

Route::middleware('auth:sanctum')->post('/submitted_requests/approve_application/{id}', [SubmittedRequestController::class, 'approve_application']);

Route::middleware('auth:sanctum')->post('/submitted_requests/approve_release/{id}', [SubmittedRequestController::class, 'approve_release']);

Route::middleware('auth:sanctum')->post('/submitted_requests/reject_request/{id}', [SubmittedRequestController::class, 'reject_request']);

Route::middleware('auth:sanctum')->post('/submitted_requests/reject_application/{id}', [SubmittedRequestController::class, 'reject_application']);

Route::middleware('auth:sanctum')->post('/submitted_requests/reject_release/{id}', [SubmittedRequestController::class, 'reject_release']);

Route::middleware('auth:sanctum')->post('/submitted_requests/sign/{id}', [SubmittedRequestController::class, 'sign']);

Route::middleware('auth:sanctum')->post('/submitted_requests/student_sign/{id}', [SubmittedRequestController::class, 'student_sign']);

Route::middleware('auth:sanctum')->post('/submitted_requests/complete/{id}', [SubmittedRequestController::class, 'complete']);

use App\Http\Controllers\SubmittedRequirementController;

Route::middleware('auth:sanctum')->get('/submitted_requirements', [SubmittedRequirementController::class, 'index']);

Route::middleware('auth:sanctum')->get('/submitted_requirements/show_active', [SubmittedRequirementController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/submitted_requirements/user/{id}', [SubmittedRequirementController::class, 'find_by_user']);

Route::middleware('auth:sanctum')->get('/submitted_requirements/request/{id}', [SubmittedRequirementController::class, 'find_by_request']);

Route::middleware('auth:sanctum')->get('/submitted_requirements/{id}', [SubmittedRequirementController::class, 'show']);

Route::middleware('auth:sanctum')->post('/submitted_requirements',[SubmittedRequirementController::class, 'create']);

Route::middleware('auth:sanctum')->post('/submitted_requirements/update/{id}', [SubmittedRequirementController::class, 'update']);

Route::middleware('auth:sanctum')->post('/submitted_requirements/delete/{id}', [SubmittedRequirementController::class, 'delete']);

//statuses

Route::middleware('auth:sanctum')->post('/submitted_requirements/approve_requirement/{id}', [SubmittedRequirementController::class, 'approve_requirement']);

Route::middleware('auth:sanctum')->post('/submitted_requirements/reject_requirement/{id}', [SubmittedRequirementController::class, 'reject_requirement']);

Route::middleware('auth:sanctum')->post('/submitted_requirements/sign/{id}', [SubmittedRequirementController::class, 'sign']);

Route::middleware('auth:sanctum')->post('/submitted_requirements/change/{id}', [SubmittedRequirementController::class, 'change_requirement']);

use App\Http\Controllers\ReceiptController;

Route::middleware('auth:sanctum')->get('/receipts', [ReceiptController::class, 'index']);

Route::middleware('auth:sanctum')->get('/receipts/show_active', [ReceiptController::class, 'show_active']);

Route::middleware('auth:sanctum')->get('/receipts/request/{id}', [ReceiptController::class, 'find_by_request']);

Route::middleware('auth:sanctum')->get('/receipts/{id}', [ReceiptController::class, 'show']);

Route::middleware('auth:sanctum')->post('/receipts',[ReceiptController::class, 'create']);

Route::middleware('auth:sanctum')->post('/receipts/update/{id}', [ReceiptController::class, 'update']);

Route::middleware('auth:sanctum')->post('/receipts/delete/{id}', [ReceiptController::class, 'delete']);

//statuses

Route::middleware('auth:sanctum')->post('/receipts/certify/{id}', [ReceiptController::class, 'certify']);

Route::middleware('auth:sanctum')->post('/receipts/sign/{id}', [ReceiptController::class, 'sign']);

Route::middleware('auth:sanctum')->post('/receipts/paid/{id}', [ReceiptController::class, 'set_paid']);