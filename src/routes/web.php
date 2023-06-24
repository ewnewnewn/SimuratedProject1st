<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndexController;
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

Route::GET('/register',[RegisterController::class,'register']);
Route::POST('/register',[RegisterController::class,'store']);
Route::GET('/login',[LoginController::class,'login']);
Route::POST('/logout',[LoginController::class,'logout']);

Route::GET('/',[IndexController::class,'index']);

