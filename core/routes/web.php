<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','menu'])->group(function () {
//     Route::resource('/email', 'EmailSendController');
//     Route::get('/monitor', 'ViewController@monitor');
//     Route::get('/sendsap', 'ViewController@sendsap');
//     Route::get('/cancelsap', 'ViewController@cancelsap');
        Route::resource('/management/menu', 'Manage\MenuController')->name('index', 'menu-man');
        Route::resource('/management/user', 'Manage\UserController')->name('index', 'user-man');
        Route::resource('/management/group', 'Manage\GroupController')->name('index', 'group');

        Route::resource('/master/attribute/value', 'Master\AttributeValueController')->name('index', 'attr.value');
        Route::resource('/master/attribute', 'Master\AttributeController')->name('index', 'attr');
        Route::resource('/master/uom', 'Master\UnitMeasureController')->name('index', 'uom');
        Route::resource('/master/branch', 'Master\CabangController')->name('index', 'branch');
        Route::resource('/master/warehouse', 'Master\GudangController')->name('index', 'whouse');
        Route::resource('/master/item', 'Master\ItemController')->name('index', 'item');
        Route::resource('/master/igroup/attr', 'Master\ItemGroupAttrController')->name('index', 'igroup.attr');
        Route::resource('/master/igroup', 'Master\ItemGroupController')->name('index', 'igroup');
        Route::resource('/master/transport', 'Master\TransportController')->name('index', 't-port');
        Route::resource('/master/transgroup', 'Master\TransportGroupController')->name('index', 't-group');
        Route::resource('/inbound', 'InboundController')->name('index', 'inbound');
        Route::resource('/outbound', 'OutboundController')->name('index', 'outbound');
        Route::resource('/assemble', 'AssembleController')->name('index', 'assemble');
        Route::resource('/disassemble', 'DisassembleController')->name('index', 'disassemble');
        Route::resource('/crossdock', 'CrossdockController')->name('index', 'crossdock');
        Route::get('/home', 'ViewController@home')->name('home');
});
Route::resource('/login', 'AuthController')->name('index', 'login');
Route::get('/', 'ViewController@plain');
// Route::get('/maintenance', 'ViewController@maintenance');
