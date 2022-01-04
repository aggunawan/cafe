<?php

use App\Http\Controllers\HomeIndexController;
use App\Http\Controllers\OrderCreateController;
use App\Http\Controllers\OrderShowController;
use App\Http\Controllers\OrderStoreController;
use Illuminate\Support\Facades\Route;

Route::get('orders/create', OrderCreateController::class)->name('orders.create');
Route::get('orders/{id}', OrderShowController::class)->name('orders.show');
Route::post('orders', OrderStoreController::class)->name('orders.store');

Route::get('/', HomeIndexController::class)->name('homes.index');
