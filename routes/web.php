<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\LensController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cameras', [CameraController::class, 'index'])->name('cameras.index');

Route::get('/lenses', [LensController::class, 'index'])->name('lenses.index');

Route::get('/accessories', [AccessoryController::class, 'index'])->name('accessories.index');

Route::get('/cameras/{id}', [CameraController::class, 'show'])->name('cameras.show');

Route::get('/lenses/{id}', [LensController::class, 'show'])->name('lenses.show');

Route::get('/accessories/{id}', [AccessoryController::class, 'show'])->name('accessories.show');

Route::post('/{type}/{id}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth')
    ->where('type', 'cameras|lenses|accessories');