<?php

use App\Http\Controllers\Api\FakeStoreApiSyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sync/fakestore', [FakeStoreApiSyncController::class, 'sync']);
