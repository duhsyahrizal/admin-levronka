<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'category_id', 'attribute', 'detail', 'price', 'color', 'tag', 'image', 'image_thumb', 'image_detail_1', 'image_detail_2', 'image_detail_3', 'image_detail_4', 'online_shop_1', 'online_shop_1'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
