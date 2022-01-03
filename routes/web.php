<?php

use App\Http\Controllers\HomeIndexController;
use App\Http\Controllers\OrderIndexController;
use App\Http\Controllers\OrderShowController;
use App\Http\Controllers\OrderStoreController;
use Illuminate\Support\Facades\Route;

Route::get('orders/{id}', OrderShowController::class)->name('orders.show');
Route::post('orders', OrderStoreController::class)->name('orders.store');
Route::get('orders', OrderIndexController::class)->name('orders.index');
Route::get('/', HomeIndexController::class)->name('homes.index');
