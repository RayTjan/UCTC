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
    'middleware' => 'coordinator',
    'prefix' => 'coordinator',
    'as' => 'coordinator.'
], function () {
    Route::get('/', 'App\Http\Controllers\Coordinator\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\Coordinator\ProgramController::class);
    Route::post('program/{id}/approve', [\App\Http\Controllers\Coordinator\ProgramController::class, 'approve'])->name('program.approve');
    Route::patch('program/{id}/suspend', [\App\Http\Controllers\Coordinator\ProgramController::class, 'suspend'])->name('program.suspend');
    Route::resource('committee',\App\Http\Controllers\Coordinator\CommitteeController::class);
    Route::post('committee/{id}/approve', [\App\Http\Controllers\Coordinator\CommitteeController::class, 'approve'])->name('committee.approve');
    Route::post('committee/{id}/reject', [\App\Http\Controllers\Coordinator\CommitteeController::class, 'reject'])->name('committee.reject');
    Route::resource('user', \App\Http\Controllers\Coordinator\UserController::class);
    Route::resource('proposal', \App\Http\Controllers\Coordinator\ProposalController::class);
    Route::post('proposal/{id}/approve', [\App\Http\Controllers\Coordinator\ProposalController::class, 'approve'])->name('proposal.approve');
    Route::patch('proposal/{id}/reject', [\App\Http\Controllers\Coordinator\ProposalController::class, 'reject'])->name('proposal.reject');
    Route::resource('report', \App\Http\Controllers\Coordinator\ReportController::class);
    Route::post('report/{id}/approve', [\App\Http\Controllers\Coordinator\ReportController::class, 'approve'])->name('report.approve');
    Route::patch('report/{id}/reject', [\App\Http\Controllers\Coordinator\ReportController::class, 'reject'])->name('report.reject');
    Route::resource('setting', \App\Http\Controllers\Coordinator\SettingController::class);
    Route::delete('report/{id}/tdestroy', [\App\Http\Controllers\Coordinator\SettingController::class, 'tdestroy'])->name('setting.tdestroy');

    Route::get('file/create/{id}', ['as' => 'file.create', 'uses' => '\App\Http\Controllers\Coordinator\FileAttachmentController@create']);
    Route::resource('file', \App\Http\Controllers\Coordinator\FileAttachmentController::class)->except('create');
    Route::resource('client', \App\Http\Controllers\Coordinator\ClientController::class);
    Route::get('action/create/{id}', ['as' => 'action.create', 'uses' => '\App\Http\Controllers\Coordinator\ActionController@create']);
    Route::resource('action', \App\Http\Controllers\Coordinator\ActionController::class)->except('create');
    Route::resource('finance', \App\Http\Controllers\Coordinator\FinanceController::class);
    Route::resource('fund', \App\Http\Controllers\Coordinator\FundController::class);
    Route::post('fund/{id}/approve', [\App\Http\Controllers\Coordinator\FundController::class, 'approve'])->name('fund.approve');
    Route::patch('fund/{id}/reject', [\App\Http\Controllers\Coordinator\FundController::class, 'reject'])->name('fund.reject');
});

Route::group([
    'middleware' => 'lecturer',
    'prefix' => 'lecturer',
    'as' => 'lecturer.'
], function () {
    Route::get('/', 'App\Http\Controllers\Lecturer\DashboardController@index');
    Route::get('program/myprogram', [\App\Http\Controllers\Lecturer\ProgramController::class, 'myprogram'])->name('program.myprogram');
    Route::resource('program', \App\Http\Controllers\Lecturer\ProgramController::class);
    Route::post('program/{id}/finish', [\App\Http\Controllers\Lecturer\ProgramController::class, 'finish'])->name('program.finish');
    Route::get('filterProgramType', [\App\Http\Controllers\Lecturer\ProgramController::class,'filterProgramType'])->name('program.filterProgramType');
    Route::get('filterProgramCategory', [\App\Http\Controllers\Lecturer\ProgramController::class,'filterProgramCategory'])->name('program.filterProgramCategory');
    Route::get('filterProgramStatus', [\App\Http\Controllers\Lecturer\ProgramController::class,'filterProgramStatus'])->name('program.filterProgramStatus');
    Route::get('filterProgramDate', [\App\Http\Controllers\Lecturer\ProgramController::class,'filterProgramDate'])->name('program.filterProgramDate');
    Route::resource('committee',\App\Http\Controllers\Lecturer\CommitteeController::class);
    Route::post('committee/{id}/approve', [\App\Http\Controllers\Lecturer\CommitteeController::class, 'approve'])->name('committee.approve');
    Route::post('committee/{id}/reject', [\App\Http\Controllers\Lecturer\CommitteeController::class, 'reject'])->name('committee.reject');
    Route::resource('client', \App\Http\Controllers\Lecturer\ClientController::class);
    Route::resource('proposal', \App\Http\Controllers\Lecturer\ProposalController::class);
    Route::get('report/create/{id}', ['as' => 'report.create', 'uses' => '\App\Http\Controllers\Lecturer\ReportController@create']);
    Route::resource('report', \App\Http\Controllers\Lecturer\ReportController::class)->except('create');
    Route::resource('user', \App\Http\Controllers\Lecturer\UserController::class);
    Route::get('action/create/{id}', ['as' => 'action.create', 'uses' => '\App\Http\Controllers\Lecturer\ActionController@create']);
    Route::resource('action', \App\Http\Controllers\Lecturer\ActionController::class)->except('create');
    Route::get('actionTask/create/{id}', ['as' => 'actionTask.create', 'uses' => '\App\Http\Controllers\Lecturer\ActionTaskController@create']);
    Route::resource('actionTask', \App\Http\Controllers\Lecturer\ActionTaskController::class)->except('create');
    Route::get('file/create/{id}', ['as' => 'file.create', 'uses' => '\App\Http\Controllers\Lecturer\FileAttachmentController@create']);
    Route::resource('file', \App\Http\Controllers\Lecturer\FileAttachmentController::class)->except('create');
    Route::resource('finance', \App\Http\Controllers\Lecturer\FinanceController::class);
    Route::resource('fund', \App\Http\Controllers\Lecturer\FundController::class);
});

Route::group([
    'middleware' => 'student',
    'prefix' => 'student',
    'as' => 'student.'
], function () {
    Route::get('/', 'App\Http\Controllers\User\DashboardController@index');
    Route::resource('program', \App\Http\Controllers\User\ProgramController::class);
    Route::resource('user', \App\Http\Controllers\User\UserController::class);
    Route::resource('committee',\App\Http\Controllers\User\CommitteeController::class);
    Route::get('/file/{id}', '\App\Http\Controllers\User\FileAttachmentController@create')->name('file.create');
    Route::resource('file', \App\Http\Controllers\User\FileAttachmentController::class)->except('create');
    Route::resource('client', \App\Http\Controllers\User\ClientController::class);

    Route::get('filterProgramType', [\App\Http\Controllers\User\ProgramController::class,'filterProgramType'])->name('program.filterProgramType');
    Route::get('filterProgramCategory', [\App\Http\Controllers\User\ProgramController::class,'filterProgramCategory'])->name('program.filterProgramCategory');
    Route::get('filterProgramStatus', [\App\Http\Controllers\User\ProgramController::class,'filterProgramStatus'])->name('program.filterProgramStatus');
    Route::get('filterProgramDate', [\App\Http\Controllers\User\ProgramController::class,'filterProgramDate'])->name('program.filterProgramDate');
    Route::resource('proposal', \App\Http\Controllers\User\ProposalController::class);
    Route::get('report/create/{id}', ['as' => 'report.create', 'uses' => '\App\Http\Controllers\User\ReportController@create']);
    Route::resource('report', \App\Http\Controllers\User\ReportController::class)->except('create');
    Route::resource('user', \App\Http\Controllers\User\UserController::class);
    Route::get('action/create/{id}', ['as' => 'action.create', 'uses' => '\App\Http\Controllers\User\ActionController@create']);
    Route::resource('action', \App\Http\Controllers\User\ActionController::class)->except('create');
    Route::get('actionTask/create/{id}', ['as' => 'actionTask.create', 'uses' => '\App\Http\Controllers\User\ActionTaskController@create']);
    Route::resource('actionTask', \App\Http\Controllers\User\ActionTaskController::class)->except('create');
    Route::get('file/create/{id}', ['as' => 'file.create', 'uses' => '\App\Http\Controllers\User\FileAttachmentController@create']);
    Route::resource('file', \App\Http\Controllers\User\FileAttachmentController::class)->except('create');
    Route::resource('finance', \App\Http\Controllers\User\FinanceController::class);
    Route::resource('fund', \App\Http\Controllers\User\FundController::class);
});
