<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $fillable = [
    'name',
    'category_id',
    'price',
    'priority',
    'status',
    'image',
    'description',
];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
