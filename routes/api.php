<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/{id}', [BookController::class, 'show']);
    Route::post('/', [BookController::class, 'store']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'destroy']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
    Route::post('/', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::post('/{id}/reduce-stock', [\App\Http\Controllers\ProductController::class, 'updatestock']);
    Route::put('/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
});
