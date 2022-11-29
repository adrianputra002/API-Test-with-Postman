<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::post('/article', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/article/limit/{count}', [App\Http\Controllers\PostController::class, 'limit']);
Route::get('/article/{id}', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/article/{id}', [App\Http\Controllers\PostController::class, 'edit']);
Route::post('/article/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
