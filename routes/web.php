<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/test-r2', function () {
    try {
        $disk = 'r2';
        $filename = 'test-' . time() . '.txt';
        $content = 'R2 Connectivity Test at ' . now();

        $success = \Illuminate\Support\Facades\Storage::disk($disk)->put($filename, $content);

        if ($success) {
            $url = \Illuminate\Support\Facades\Storage::disk($disk)->url($filename);
            return [
                'status' => 'success',
                'message' => 'File uploaded successfully!',
                'file' => $filename,
                'url' => $url
            ];
        }

        return ['status' => 'error', 'message' => 'Upload failed without exception.'];
    } catch (\Exception $e) {
        return [
            'status' => 'exception',
            'message' => $e->getMessage(),
            // 'trace' => $e->getTraceAsString()
        ];
    }
});
