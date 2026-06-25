<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sub_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $fruitsId = DB::table('categories')->where('title', 'Fresh Fruits')->value('id') ?? 1;
        $veggiesId = DB::table('categories')->where('title', 'Organic Vegetables')->value('id') ?? 2;

        $subCategories = [

            [
                'category_id' => $fruitsId,
                'title'       => 'Citrus Fruits',
                'image'       => 'https://unsplash.com',
                'priority'    => 1,
            ],
            [
                'category_id' => $fruitsId,
                'title'       => 'Tropical Fruits',
                'image'       => 'https://unsplash.com',
                'priority'    => 2,
            ],

            [
                'category_id' => $veggiesId,
                'title'       => 'Leafy Greens',
                'image'       => 'https://unsplash.com',
                'priority'    => 3,
            ],
            [
                'category_id' => $veggiesId,
                'title'       => 'Root Vegetables',
                'image'       => 'https://unsplash.com',
                'priority'    => 4,
            ]
        ];

        foreach ($subCategories as $subCat) {
            DB::table('sub_categories')->insert([
                'category_id' => $subCat['category_id'],
                'title'       => $subCat['title'],
                'slug'        => Str::slug($subCat['title']),
                'image'       => $subCat['image'],
                'status'      => 1,
                'priority'    => $subCat['priority'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
