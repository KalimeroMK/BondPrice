<?php

use Illuminate\Support\Facades\Route;

Route::post('bond-price', [App\Http\Controllers\BondPriceController::class, 'store']);
