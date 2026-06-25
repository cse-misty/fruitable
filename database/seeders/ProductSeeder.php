<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $fruitsId = DB::table('categories')->where('title', 'Fresh Fruits')->value('id') ?? 1;
        $veggiesId = DB::table('categories')->where('title', 'Organic Vegetables')->value('id') ?? 2;
        $berriesId = DB::table('categories')->where('title', 'Fresh Berries')->value('id') ?? 3;

        $products = [
            [
                'name'            => 'Fresh Apples',
                'description'     => 'Sweet and crunchy organic red apples freshly picked from the orchard.',
                'price'           => 4.99,
                'category_id'     => $fruitsId,
                'sub_category_id' => null,
                'image'           => 'products/apple.jpg',
                'status'          => 'active',
                'priority'        => 1,
                'sold_count'      => 45,
                'rating'          => 3.50,
                'review_count'    => 12,
            ],
            [
                'name'            => ' Green Broccoli',
                'description'     => 'Nutrient-rich and 100% chemical-free organic green broccoli.',
                'price'           => 2.49,
                'category_id'     => $veggiesId,
                'sub_category_id' => null,
                'image'           => 'products/broccoli.jpg',
                'status'          => 'active',
                'priority'        => 2,
                'sold_count'      => 80,
                'rating'          => 2.80,
                'review_count'    => 24,
            ],
            [
                'name'            => ' Strawberries',
                'description'     => 'Juicy and sweet organic strawberries packed with vitamin C.',
                'price'           => 5.99,
                'category_id'     => $berriesId,
                'sub_category_id' => null,
                'image'           => 'products/strawberry.jpg',
                'status'          => 'active',
                'priority'        => 3,
                'sold_count'      => 120,
                'rating'          => 3.90,
                'review_count'    => 56,
            ],
            [
                'name'            => ' Juicy Oranges',
                'description'     => 'Premium quality citrus fresh oranges direct from the farm.',
                'price'           => 3.99,
                'category_id'     => $fruitsId,
                'sub_category_id' => null,
                'image'           => 'products/orange.jpg',
                'status'          => 'active',
                'priority'        => 4,
                'sold_count'      => 60,
                'rating'          => 2.30,
                'review_count'    => 18,
            ]
        ];

foreach ($products as $product) {
    DB::table('products')->insert([
        'name'            => $product['name'],
        'description'     => $product['description'],
        'price'           => $product['price'],
        'category_id'     => $product['category_id'],
        'sub_category_id' => $product['sub_category_id'],
        'image'           => $product['image'],
        'status'          => 1,
        'priority'        => $product['priority'],
        'sold_count'      => $product['sold_count'],
        'rating'          => $product['rating'],
        'review_count'    => $product['review_count'],
        'created_at'      => now(),
        'updated_at'      => now(),
    ]);
}

    }
}
