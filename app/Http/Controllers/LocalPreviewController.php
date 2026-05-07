<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class LocalPreviewController extends Controller
{
    public function sync()
    {
        // pobrac produkty
        $items = Product::all();

        $items = collect($items)->map(function ($item) {
            $item['category_name'] = Category::find($item['category_id'])->name ?? Category::first()->name;
            return $item;
        });

        $items = $items->toArray();

        // return view
        return view('local', [
            'items' => $items,
            'count' => count($items),
            'error' => '',
        ]);
    }
}
