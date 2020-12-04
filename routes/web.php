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
    return redirect()->route('program.index');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('program', \App\Http\Controllers\ProgramController::class);
Route::resource('action', \App\Http\Controllers\ActionPlanController::class);
Route::resource('task', \App\Http\Controllers\TaskController::class);
Route::resource('client', \App\Http\Controllers\ClientController::class);
Route::resource('proposal', \App\Http\Controllers\ProposalController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
