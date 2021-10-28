<?php

use App\Http\Controllers\EditorController;
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



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/editor', [EditorController::class, 'create'])->middleware('auth')->name('edit');
Route::post('/post/store', [EditorController::class, 'store'])->name('content');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

