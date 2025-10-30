<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PublicDashboardController;

Route::get('/', [PublicDashboardController::class, 'landing'])->name('public.landing');
Route::get('/data', [PublicDashboardController::class, 'data'])->name('public.data');
Route::get('/grafik', [PublicDashboardController::class, 'charts'])->name('public.charts');

Route::get('/dashboard', function () {
    return redirect()->route('public.data');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/admin/import', [ImportController::class, 'form'])->name('import.form');
  Route::post('/admin/import', [ImportController::class, 'store'])->name('import.store');
  Route::post('/admin/import/reset', [ImportController::class, 'reset'])->name('import.reset');
});

Route::get('/test-upload', function() {
    $path = storage_path('app/imports/test.txt');
    file_put_contents($path, "hello world");
    return file_exists($path) ? 'OK tersimpan: '.$path : 'GAGAL';
});

require __DIR__.'/auth.php';
