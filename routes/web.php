<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkTypeController;
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
    Route::get('/dashboard', function () {
        return view(view: 'dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name(name: 'profile');

    Route::resource('worktypes', WorkTypeController::class);
    Route::resource('projects', ProjectController::class);
});


require __DIR__.'/auth.php';
