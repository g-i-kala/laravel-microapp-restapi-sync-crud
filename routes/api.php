<?php

use App\Http\Controllers\Api\FakeStoreApiSyncController;
use Illuminate\Support\Facades\Route;

Route::get('sync/fakestore', [FakeStoreApiSyncController::class, 'sync']);
