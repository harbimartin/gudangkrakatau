<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','menu'])->group(function () {
//     Route::resource('/email', 'EmailSendController');
//     Route::get('/monitor', 'ViewController@monitor');
//     Route::get('/sendsap', 'ViewController@sendsap');
//     Route::get('/cancelsap', 'ViewController@cancelsap');
        Route::resource('/menu-man', 'MenuController');
        Route::resource('/user-man', 'UserController');
        Route::resource('/group', 'GroupController');

        Route::resource('/uom', 'Master\UnitMeasureController');
        Route::resource('/cabang', 'Master\CabangController');
        Route::resource('/gudang', 'Master\GudangController');
        Route::resource('/brand', 'Master\BrandController');
        Route::resource('/item', 'Master\ItemController');
        Route::resource('/transport', 'Master\TransportController');
        Route::resource('/transgroup', 'Master\TransportGroupController');
        Route::resource('/inbound', 'InboundController');
        Route::get('/home', 'ViewController@home')->name('home');
});
Route::resource('/login', 'AuthController')->name('index', 'login');
Route::get('/', 'ViewController@plain');
// Route::get('/maintenance', 'ViewController@maintenance');
