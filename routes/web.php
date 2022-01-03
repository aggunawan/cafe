<?php

use App\Http\Controllers\HomeIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeIndexController::class)->name('homes.index');
