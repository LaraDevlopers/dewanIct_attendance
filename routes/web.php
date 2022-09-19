<?php

use App\Http\Controllers\resultController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register' => false]);

Route::get('/admin', 'App\Http\Controllers\dashboardController@dashboard')->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'result', 'as' => 'result.'], function() {
    Route::get('index', [resultController::class, 'index'])->name('index');
    Route::post('store', [resultController::class, 'store'])->name('store');
    Route::get('show', [resultController::class, 'show'])->name('show');
    Route::post('update', [resultController::class, 'update'])->name('update');
    Route::get('delete', [resultController::class, 'delete'])->name('delete');
    Route::get('search', [resultController::class, 'search'])->name('search');

});

Route::get('/', [studentController::class, 'index'])->name('home');
Route::post('/search', [studentController::class, 'search'])->name('student.result.search');
Route::get('/search/by/keyup', [studentController::class, 'search_by_keyup'])->name('student.result.search_by_keyup');





