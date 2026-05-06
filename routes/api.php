<?php

use App\Http\Controllers\Api\FakeStoreApiSyncController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sync/fakestore', [FakeStoreApiSyncController::class, 'sync']);
Route::get('/products', [ProductController::class, 'index']);
