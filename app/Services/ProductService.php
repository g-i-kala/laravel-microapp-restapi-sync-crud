<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductService
{
    /**
     * Store product in db
     * */

    public function updateOrCreate(array $item): Product
    {
        $category = Category::firstOrCreate([
             'name' => $item['category'],
         ]);

        return Product::updateOrCreate(
            ['external_id' => $item['id']],
            [
                'name' => $item['name'],
                'price' => $item['price'],
                'description' => $item['description'],
                'category_id' => $category->id,
            ]
        );
    }

    /**
     * Get single product from db
     * with the given id
     * */

    public function getSingle(string $id): Product
    {
        $product = Product::findOrFail($id);

        return $product;
    }

    /**
    * Delete single product from db
    * with the given id
    * */

    public function deleteSingle(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
        } else {
            return response()->json([
                'error' => 'Delete unsucessfull.',
            ]);
        }

        return response()->json([
                'message' => 'Delete sucessfull.',
            ]);
    }

}
