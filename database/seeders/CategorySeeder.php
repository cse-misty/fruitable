<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            [
                'title'       => 'Fresh Fruits',
                'description' => 'Get 100% organic and fresh juicy fruits direct from farms.',
                'image'       => 'categories/fruits.jpg',
                'thumbnail'   => 'categories/fruits_thumb.jpg',
                'priority'    => 1,
            ],
            [
                'title'       => 'Vegetables',
                'description' => 'Chemical-free fresh green vegetables for your healthy life.',
                'image'       => 'categories/vegetables.jpg',
                'thumbnail'   => 'categories/vegetables_thumb.jpg',
                'priority'    => 2,
            ],
            [
                'title'       => ' Berries',
                'description' => 'Delicious and nutrient-rich strawberries, blueberries, and more.',
                'image'       => 'categories/berries.jpg',
                'thumbnail'   => 'categories/berries_thumb.jpg',
                'priority'    => 3,
            ],
            [
                'title'       => 'Dried',
                'description' => 'Premium quality healthy dried fruits and nuts mixed package.',
                'image'       => 'categories/dried.jpg',
                'thumbnail'   => 'categories/dried_thumb.jpg',
                'priority'    => 4,
            ]
        ];

        foreach ($categories as $category) {
    DB::table('categories')->insert([
        'title'       => $category['title'],
        'slug'        => Str::slug($category['title']),
        'image'       => $category['image'],
        'thumbnail'   => $category['thumbnail'],
        'description' => $category['description'],
        'status'      => 1,
        'priority'    => $category['priority'],
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);
}
    }
}
