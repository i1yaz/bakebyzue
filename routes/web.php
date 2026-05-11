<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/collections/{category:slug?}', [ProductController::class, 'index'])->name('category.show');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::view('/privacy-policy', 'legal')->name('privacy');
Route::view('/terms-and-conditions', 'legal')->name('terms');

Route::get('/refresh', function () {
    opcache_reset();

    return 'Cache cleared';
});
