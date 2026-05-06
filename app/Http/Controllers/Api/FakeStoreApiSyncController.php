<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class FakeStoreApiSyncController extends Controller
{
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
            $category = Category::firstOrCreate([
                'name' => $item['category'],
            ]);

            Product::updateOrCreate(
                ['external_id' => $item['id']],
                [
                    'name' => $item['title'],
                    'price' => $item['price'],
                    'description' => $item['description'],
                    'category_id' => $category->id ?? 1,
                ]
            );
        }

        // json return
        return response()->json([
            'count' => count($items),
            'message' => 'Sync completed.',
        ]);
    }
}
