<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', [DashboardController::class, 'show'])->name(name: 'dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name(name: 'profile');
    Route::post('/profile.update_avatar', [ProfileController::class, 'update_avatar'])->name(name: 'profile.update_avatar');
    Route::put('/profile.update', [ProfileController::class, 'update'])->name(name: 'profile.update');

    Route::resource('worktypes', WorkTypeController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('works', WorkController::class);
});


require __DIR__.'/auth.php';
