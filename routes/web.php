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

Route::get('/test' , function () {
    $discord = new DiscordClient(['token' => env('DISCORD_TOKEN')]);

    dd($discord->guild->getGuildRoles(['guild.id' =>  (int) env('DIsCORD_SERVER')]));
    $discord->guild->addGuildMemberRole([
        'guild.id' =>  (int) env('DIsCORD_SERVER'),
        'user.id' =>  658445453569818646,
        'role.id' =>  1008122320197529650,
    ]);
    $discord->guild->removeGuildMemberRole([
        'guild.id' =>  (int) env('DIsCORD_SERVER'),
        'user.id' =>  658445453569818646,
        'role.id' =>  1008122320197529650,
    ]);

});

Route::group(['middleware'=>['auth'] ] , function (){
    Route::get('dashboard' , [\App\Http\Controllers\Panel\MainController::class , 'dashboard'])->name('dashbaord');
    Route::get('history' , [\App\Http\Controllers\Panel\MainController::class , 'history'])->name('history');
    Route::get('subscribe/{tire}' , [\App\Http\Controllers\Panel\MainController::class , 'buy'])->name('buy');
    Route::get('verify/{transaction}' , [\App\Http\Controllers\Panel\MainController::class , 'callback'])->name('callback');
});

Route::get('/upgradeToAdmin/{user}' , [\App\Http\Controllers\Panel\MainController::class,'setAsAdmin'])->middleware('dynamicAcl')->name('upgradeToAdmin');
