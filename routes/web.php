<?php

use App\Http\Controllers\Api\FakeStoreApiSyncController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sync-preview', [FakeStoreApiSyncController::class, 'sync'])->name('sync.preview]');
