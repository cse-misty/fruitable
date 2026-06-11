<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
     use Sluggable,HasFactory;



    protected $fillable = [
    'title',
    'slug',
    'image',
    'thumbnail',
    'status',
    'priority',
    'description',

    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

        public function products()
        {
            return $this->hasMany(Product::class);
        }
}
