<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\UserController;
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
Route::post('api-register',[RegisterController::class,'register']);
Route::post('api-login',[LoginController::class,'login']);
Route::group(['middleware' => 'auth:api'], function (){
    Route::apiResource('programs', ProgramController::class);
    Route::apiResource('actions', \App\Http\Controllers\api\ActionPlanController::class);
    Route::apiResource('tasks', \App\Http\Controllers\api\TaskController::class);
    Route::get('/programs/{id}/committees', [ProgramController::class,'committees']);
    Route::get('/user/{id}/tasks', [UserController::class,'userTasks']);
    Route::get('/user/task/{id}', [\App\Http\Controllers\api\TaskController::class,'thisTask']);
    Route::apiResource('profile', UserController::class);
    Route::post('logout', [LoginController::class,'logout']);
});
