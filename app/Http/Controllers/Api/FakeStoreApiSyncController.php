<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Http;

class FakeStoreApiSyncController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function sync()
    {
        // get the products
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->failed()) {
            return response()->json(['message' => 'Faild to fetch products'], 502);
        };

        $items = $response->json();

        // add products to db
        foreach ($items as $item) {
            $item['name'] = $item['title'];
            $this->productService->updateOrCreate($item);
        }

        // json return
        return response()->json([
            'count' => count($items),
            'message' => 'Sync completed.',
        ], 200);
    }
}
