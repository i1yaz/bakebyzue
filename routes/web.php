<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/collections/{category:slug?}', [ProductController::class, 'index'])->name('category.show');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/refresh', function () {
    opcache_reset();

    return 'Cache cleared';
});
