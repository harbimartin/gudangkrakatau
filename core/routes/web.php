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
        Route::resource('/master/warehouse/type', 'Master\GudangTypeController')->name('index', 'whtype');
        Route::resource('/master/warehouse', 'Master\GudangController')->name('index', 'whouse');
        Route::resource('/master/origin', 'Master\AsalController')->name('index', 'origin');
        Route::resource('/master/item/classification', 'Master\ItemClassificationController')->name('index', 'iclass');
        Route::resource('/master/item/attributes', 'Master\ItemAttributeController')->name('index', 'item.attr');
        Route::resource('/master/item', 'Master\ItemController')->name('index', 'item');
        Route::resource('/master/item-group/attr', 'Master\ItemGroupAttrController')->name('index', 'igroup.attr');
        Route::resource('/master/item-group', 'Master\ItemGroupController')->name('index', 'igroup');
        Route::resource('/master/transport', 'Master\TransportController')->name('index', 't-port');
        Route::resource('/master/transgroup', 'Master\TransportGroupController')->name('index', 't-group');
        Route::resource('/inbound/in-item', 'InboundItemController')->name('index', 'inbound.item');
        Route::resource('/inbound/list', 'InboundListController')->name('index', 'inbound.list');
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
