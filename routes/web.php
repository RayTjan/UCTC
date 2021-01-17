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
    Route::post('program/{id}/approve', [\App\Http\Controllers\Admin\ProgramController::class, 'approve'])->name('program.approve');
    Route::post('program/{id}/suspend', [\App\Http\Controllers\Admin\ProgramController::class, 'suspend'])->name('program.suspend');
    Route::resource('committee',\App\Http\Controllers\Admin\CommitteeController::class);
    Route::post('committee/{id}/approve', [\App\Http\Controllers\Admin\CommitteeController::class, 'approve'])->name('committee.approve');
    Route::post('committee/{id}/reject', [\App\Http\Controllers\Admin\CommitteeController::class, 'reject'])->name('committee.reject');
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('proposal', \App\Http\Controllers\Admin\ProposalController::class);
    Route::post('proposal/{id}/approve', [\App\Http\Controllers\Admin\ProposalController::class, 'approve'])->name('proposal.approve');
    Route::post('proposal/{id}/reject', [\App\Http\Controllers\Admin\ProposalController::class, 'reject'])->name('proposal.reject');
    Route::resource('report', \App\Http\Controllers\Admin\ReportController::class);
    Route::post('report/{id}/approve', [\App\Http\Controllers\Admin\ReportController::class, 'approve'])->name('report.approve');
    Route::post('report/{id}/reject', [\App\Http\Controllers\Admin\ReportController::class, 'reject'])->name('report.reject');
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);

    Route::get('file/create/{id}', ['as' => 'file.create', 'uses' => '\App\Http\Controllers\Admin\FileAttachmentController@create']);
    Route::resource('file', \App\Http\Controllers\Admin\FileAttachmentController::class)->except('create');
    Route::resource('client', \App\Http\Controllers\Admin\ClientController::class);
    Route::get('action/create/{id}', ['as' => 'action.create', 'uses' => '\App\Http\Controllers\Admin\ActionController@create']);
    Route::resource('action', \App\Http\Controllers\Admin\ActionController::class)->except('create');
    Route::resource('finance', \App\Http\Controllers\Admin\FinanceController::class);
});

Route::group([
    'middleware' => 'staff',
    'prefix' => 'staff',
    'as' => 'staff.'
], function () {
    Route::get('/', 'App\Http\Controllers\Staff\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\Staff\ProgramController::class);
    Route::get('filterProgramType', [\App\Http\Controllers\Staff\ProgramController::class,'filterProgramType'])->name('program.filterProgramType');
    Route::get('filterProgramCategory', [\App\Http\Controllers\Staff\ProgramController::class,'filterProgramCategory'])->name('program.filterProgramCategory');
    Route::get('filterProgramStatus', [\App\Http\Controllers\Staff\ProgramController::class,'filterProgramStatus'])->name('program.filterProgramStatus');
    Route::get('filterProgramDate', [\App\Http\Controllers\Staff\ProgramController::class,'filterProgramDate'])->name('program.filterProgramDate');
    Route::resource('committee',\App\Http\Controllers\Staff\CommitteeController::class);
    Route::post('committee/{id}/approve', [\App\Http\Controllers\Staff\CommitteeController::class, 'approve'])->name('committee.approve');
    Route::post('committee/{id}/reject', [\App\Http\Controllers\Staff\CommitteeController::class, 'reject'])->name('committee.reject');
    Route::resource('client', \App\Http\Controllers\Staff\ClientController::class);
    Route::resource('proposal', \App\Http\Controllers\Staff\ProposalController::class);
    Route::get('report/create/{id}', ['as' => 'report.create', 'uses' => '\App\Http\Controllers\Staff\ReportController@create']);
    Route::resource('report', \App\Http\Controllers\Staff\ReportController::class)->except('create');
    Route::resource('user', \App\Http\Controllers\Staff\UserController::class);
    Route::get('action/create/{id}', ['as' => 'action.create', 'uses' => '\App\Http\Controllers\Staff\ActionController@create']);
    Route::resource('action', \App\Http\Controllers\Staff\ActionController::class)->except('create');
    Route::get('actionTask/create/{id}', ['as' => 'actionTask.create', 'uses' => '\App\Http\Controllers\Staff\ActionTaskController@create']);
    Route::resource('actionTask', \App\Http\Controllers\Staff\ActionTaskController::class)->except('create');
    Route::get('file/create/{id}', ['as' => 'file.create', 'uses' => '\App\Http\Controllers\Staff\FileAttachmentController@create']);
    Route::resource('file', \App\Http\Controllers\Staff\FileAttachmentController::class)->except('create');
    Route::resource('finance', \App\Http\Controllers\Staff\FinanceController::class);
});

Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    Route::get('/', 'App\Http\Controllers\User\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\User\ProgramController::class);
    Route::resource('user', \App\Http\Controllers\User\UserController::class);
    Route::resource('committee',\App\Http\Controllers\User\CommitteeController::class);
    Route::resource('file', \App\Http\Controllers\User\FileAttachmentController::class)->except('create');
    Route::patch('/file/{id}', '\App\Http\Controllers\User\FileAttachmentController@create')->name('file.create');
    Route::resource('client', \App\Http\Controllers\User\ClientController::class);
});
