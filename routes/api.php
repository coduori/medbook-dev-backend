<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
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

Route::get('/patients',[PatientController::class,'index']);
Route::get('/patient/{id}',[PatientController::class,'show']);
Route::post('/patient',[PatientController::class,'store']);
Route::patch('/patient/{id}',[PatientController::class,'update']);
Route::delete('/patient/{id}',[PatientController::class,'destroy']);

Route::get('/services',[ServiceController::class,'index']);
Route::get('/service/{id}',[ServiceController::class,'show']);
Route::post('/service',[ServiceController::class,'store']);
Route::patch('/service/{id}',[ServiceController::class,'update']);
Route::delete('/service/{id}',[ServiceController::class,'destroy']);
