<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class FakeStoreApiSyncController extends Controller
{
    public function sync()
    {
        // pobrac produkty
        $response = Http::get('https://fakestoreapi.com/products');
        //dd($response->json());
        // debug wyswietlic co sie popbralo
        if ($response->failed()) {
            return view('sync', ['error' => 'Faild to fetch products']);
        };

        $items = $response->json();

        // return view
        return view('sync', [
            'items' => $items,
            'count' => count($items),
            'error' => '',
        ]);
    }
}
