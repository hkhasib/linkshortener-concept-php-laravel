<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ShortlinkController;
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

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/do-login',[AuthController::class,'login'])->name('post.login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[ShortlinkController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/create-shortlink',[ShortlinkController::class,'linkShortener'])->middleware('auth')->name('store.shortlink');
Route::get('/shortlinks',[ShortlinkController::class,'index'])->middleware('auth')->name('shortlinks');


Route::get('/{id}',[ShortlinkController::class,'redirect']);

