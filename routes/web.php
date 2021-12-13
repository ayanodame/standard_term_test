<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/',[ContactController::class,'indexview']);
Route::post('/check',[ContactController::class,'check']);
Route::post('/create',[ContactController::class,'create']);
Route::get('/thanks',[ContactController::class,'thanksview']);
Route::get('/search',[ContactController::class,'searchview']);
Route::post('/search/result',[ContactController::class,'search']);
Route::get('/search/result',[ContactController::class,'search']);
Route::post('/search/delete',[ContactController::class,'delete']);