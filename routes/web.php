<?php

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

Route::group(['middleware'=>['auth'] ] , function (){
    Route::get('dashboard' , [\App\Http\Controllers\Panel\MainController::class , 'dashboard'])->name('dashbaord');
    Route::get('history' , [\App\Http\Controllers\Panel\MainController::class , 'dashboard'])->name('history');
    Route::get('subscribe/{id}' , [\App\Http\Controllers\Panel\MainController::class , 'dashboard'])->name('buy');
});
