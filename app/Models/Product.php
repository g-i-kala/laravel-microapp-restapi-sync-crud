<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'external_id',
    'name',
    'price',
    'description',
    'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
