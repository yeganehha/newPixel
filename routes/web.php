<?php

use Illuminate\Support\Facades\Route;
use RestCord\DiscordClient;

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

//Route::get('/test', function () {
//    $t = \App\Models\Transaction::with('user')->find(1325);
//    dd($t);
//});

Route::group(['middleware'=>['auth'] ] , function (){
    Route::get('dashboard' , [\App\Http\Controllers\Panel\MainController::class , 'dashboard'])->name('dashbaord');
    Route::get('history' , [\App\Http\Controllers\Panel\MainController::class , 'history'])->name('history');
    Route::get('back-history' , [\App\Http\Controllers\Panel\MainController::class , 'backHistory'])->name('backHistory');
    Route::get('subscribe/{tire}' , [\App\Http\Controllers\Panel\MainController::class , 'buy'])->name('buy');
    Route::get('verify/{transaction}' , [\App\Http\Controllers\Panel\MainController::class , 'callback'])->name('callback');
    Route::get('get-rolls' , [\App\Http\Controllers\Panel\MainController::class , 'getRoll'])->name('getRoll');
});

Route::get('/upgradeToAdmin/{user}' , [\App\Http\Controllers\Panel\MainController::class,'setAsAdmin'])->middleware('dynamicAcl')->name('upgradeToAdmin');
