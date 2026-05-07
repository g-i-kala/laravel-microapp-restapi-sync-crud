<?php

use App\Http\Controllers\FakeStoreApiSyncController;
use App\Http\Controllers\LocalPreviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sync-preview', [FakeStoreApiSyncController::class, 'sync'])->name('sync.preview]');
Route::get('/local-preview', [LocalPreviewController::class, 'sync'])->name('local.preview]');
