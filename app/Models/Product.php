<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // protected $fillable = [
    // 'name',
    // 'category_id',
    // 'price',
    // 'priority',
    // 'status',
    // 'image',
    // 'description',
    // 'sub_category_id',


    public function category()
        {
            return $this->belongsTo(Category::class);
        }
    public function subCategory()
        {
            return $this->belongsTo(SubCategory::class, 'sub_category_id');
        }


    public function reviews()
        {

            return $this->hasMany(Review::class)->where('status', 1)->latest();
        }

}
