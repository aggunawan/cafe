<?php

use App\Http\Controllers\HomeIndexController;
use App\Http\Controllers\OrderCreateController;
use App\Http\Controllers\OrderDishDeleteController;
use App\Http\Controllers\OrderDishStoreController;
use App\Http\Controllers\OrderPlaceStoreController;
use App\Http\Controllers\OrderShowController;
use App\Http\Controllers\OrderStateIndexController;
use App\Http\Controllers\OrderStoreController;
use App\Http\Controllers\ScanIndexController;
use App\Http\Controllers\WelcomeIndexController;
use Illuminate\Support\Facades\Route;

Route::get('scans', ScanIndexController::class)->name('scans.index');
Route::get('welcomes', WelcomeIndexController::class)->name('welcomes.index');

Route::get('orders/{id}/states', OrderStateIndexController::class)->name('orders.states.index');
Route::post('orders/{id}/places', OrderPlaceStoreController::class)->name('orders.places.store');
Route::delete('orders/{id}/dishes/{dish}', OrderDishDeleteController::class)->name('orders.dishes.delete');
Route::post('orders/{id}/dishes', OrderDishStoreController::class)->name('orders.dishes.store');

Route::get('orders/create', OrderCreateController::class)->name('orders.create');
Route::get('orders/{id}', OrderShowController::class)->name('orders.show');
Route::post('orders', OrderStoreController::class)->name('orders.store');

Route::get('/', HomeIndexController::class)->name('homes.index');
