<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::resource('/email', 'EmailSendController');
    Route::get('/monitor', 'ViewController@monitor');
    Route::get('/sendsap', 'ViewController@sendsap');
    Route::get('/cancelsap', 'ViewController@cancelsap');
    Route::get('/home', 'ViewController@home');
});
Route::get('/', 'ViewController@plain');
Route::get('/maintenance', 'ViewController@maintenance');
