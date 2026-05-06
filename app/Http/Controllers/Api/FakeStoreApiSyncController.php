<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class FakeStoreApiSyncController extends Controller
{
    public function sync()
    {
        // pobrac produkty
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->failed()) {
            return response()->json(['message' => 'Faild to fetch products'], 502);
        };
        // debug wyswietlic co sie popbralo
        $items = $response->json();

        // zwrotka w json
        return $response->json();
    }
}
