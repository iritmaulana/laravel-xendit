<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{product}/order', [OrderController::class, 'store'])->name('orders.store');
Route::post('/payment/callback', [OrderController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', fn() => view('payment.success'))->name('payment.success');
Route::get('/payment/failed', fn() => view('payment.failed'))->name('payment.failed');
