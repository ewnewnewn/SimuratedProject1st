<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RecessController;

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

/*
Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
*/


Route::middleware('auth')->group(function(){
    Route::get('/',[AuthController::class,'index']);
});

Route::middleware('auth')->group(function(){
    Route::get('/attendance',[AuthController::class,'attendance']);
});

Route::post('/workstart',[AttendanceController::class,'workStart']);
Route::post('/workend',[AttendanceController::class,'workEnd']);
Route::post('/recessstart',[RecessController::class,'recessStart']);
Route::post('/recessend',[RecessController::class,'recessEnd']);