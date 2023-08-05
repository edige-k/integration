<?php


use App\Http\Controllers\User\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('', [ProductController::class, 'show'])->name('product-show');
Route::post('/pay', [ProductController::class, 'handlePayment'])->name('handlePayment');

