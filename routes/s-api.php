<?php

use App\Http\Controllers\Api\FakeStoreApiSyncController;
use Illuminate\Support\Facades\Route;

Route::get('sync/fakestore', [FakeStoreApiSyncController::class, 'sync']);
Route::get('/debug-test', function () {
    return response()->json(['ok' => true]);
});
