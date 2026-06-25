<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('faq_catagories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $faqCategories = [
            'General Questions',
            'Shipping & Delivery',
            'Orders & Payments',
            'Returns & Refunds'
        ];

        foreach ($faqCategories as $categoryName) {
            DB::table('faq_catagories')->insert([
                'name'       => $categoryName,
                'slug'       => Str::slug($categoryName),
                'status'     => 'active', 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
