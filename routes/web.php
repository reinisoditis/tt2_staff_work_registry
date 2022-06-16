<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkTypeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ReportController;
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

Route::redirect('/', '/login');

Route::group(['middleware' => 'auth'], function() {

    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
    Route::get('/dashboard', [DashboardController::class, 'show'])->name(name: 'dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name(name: 'profile');
    Route::post('/profile.update_avatar', [ProfileController::class, 'update_avatar'])->name(name: 'profile.update_avatar');
    Route::put('/profile.update', [ProfileController::class, 'update'])->name(name: 'profile.update');

    Route::get('/reports.personal_index', [ReportController::class, 'personal_index'])->name(name: 'reports.personal_index');
    Route::get('/reports.project_index', [ReportController::class, 'project_index'])->name(name: 'reports.project_index');

    Route::get('/users/{id}/promote', [UserController::class, 'promote'])->name('users.promote');
    Route::get('/users/{id}/demote', [UserController::class, 'demote'])->name('users.demote');
    Route::resource('users', UserController::class);
    Route::resource('worktypes', WorkTypeController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('works', WorkController::class);

});


require __DIR__.'/auth.php';
