<?php

use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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


//Route::get('/', function () {
////    return redirect()->route('program.index');
//    return view('3rdRoleBlades.dashboard');
//});

Auth::routes();

Route::get('/', 'App\Http\Controllers\DashboardController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('program', \App\Http\Controllers\ProgramController::class);
//Route::resource('user', \App\Http\Controllers\UserController::class);

Route::get('activate', [\App\Http\Controllers\Auth\ActivationController::class, 'activate'])->name('activate');

//Route::resource('action', \App\Http\Controllers\ActionPlanController::class);
//Route::resource('task', \App\Http\Controllers\TaskController::class);
//Route::resource('client', \App\Http\Controllers\ClientController::class);
//Route::resource('proposal', \App\Http\Controllers\ProposalController::class);
//Route::resource('committee',\App\Http\Controllers\CommitteeController::class);
//Route::post('committee/{id}/approve', [\App\Http\Controllers\CommitteeController::class, 'approve'])->name('committee.approve');
//Route::post('committee/{id}/reject', [\App\Http\Controllers\CommitteeController::class, 'reject'])->name('committee.reject');



Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\Admin\ProgramController::class);
    Route::resource('committee',\App\Http\Controllers\Admin\CommitteeController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('proposal', \App\Http\Controllers\Admin\ProposalController::class);
    Route::resource('report', \App\Http\Controllers\Admin\ReportController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
});

Route::group([
    'middleware' => 'staff',
    'prefix' => 'staff',
    'as' => 'staff.'
], function () {
    Route::get('/', 'App\Http\Controllers\Staff\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\Staff\ProgramController::class);
    Route::resource('committee',\App\Http\Controllers\Staff\CommitteeController::class);
    Route::post('committee/{id}/approve', [\App\Http\Controllers\Staff\CommitteeController::class, 'approve'])->name('committee.approve');
    Route::post('committee/{id}/reject', [\App\Http\Controllers\Staff\CommitteeController::class, 'reject'])->name('committee.reject');
    Route::resource('action', \App\Http\Controllers\Staff\ActionPlanController::class);
    Route::resource('task', \App\Http\Controllers\Staff\TaskController::class);
    Route::resource('client', \App\Http\Controllers\Staff\ClientController::class);
    Route::resource('proposal', \App\Http\Controllers\Staff\ProposalController::class);
    Route::resource('user', \App\Http\Controllers\Staff\UserController::class);
});

Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    Route::get('/', 'App\Http\Controllers\User\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\User\ProgramController::class);
    Route::resource('task', \App\Http\Controllers\User\TaskController::class);
    Route::resource('user', \App\Http\Controllers\User\UserController::class);
    Route::resource('committee',\App\Http\Controllers\User\CommitteeController::class);
});
