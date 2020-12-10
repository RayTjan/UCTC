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
Route::post('api-register',[\App\Http\Controllers\Api\Auth\RegisterController::class,'register']);
Route::post('api-login',[\App\Http\Controllers\Api\Auth\LoginController::class,'login']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    Route::apiResource('programs',\App\Http\Controllers\Api\ProgramController::class);
});
