<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FakeStoreApiSyncController extends Controller
{
    public function sync()
    {
        // pobrac produkty
        $response = Http::get('https://fakestoreapi.com/products');
        dd($response);
        // debug wyswietlic co sie popbralo

        // zwrotka w json
        return view('sync', ['products' => $response]);
    }
}
