<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $pages = [
            [
                'title'   => 'Privacy Policy',
                'slug'    => 'privacy-policy',
                'content' => '<h3>1. Information We Collect</h3><p>We collect information from you when you register on our site, place an order, or subscribe to our newsletter.</p><h3>2. Data Protection</h3><p>We implement a variety of security measures to maintain the safety of your personal information when you place an order.</p>',
            ],
            [
                'title'   => 'Terms & Conditions',
                'slug'    => 'terms-conditions',
                'content' => '<h3>1. User Agreement</h3><p>By accessing this website, you are agreeing to be bound by these website Terms and Conditions of Use.</p><h3>2. Limitations</h3><p>In no event shall Fruitables or its suppliers be liable for any damages arising out of the use or inability to use the materials.</p>',
            ],
            [
                'title'   => 'Return Policy',
                'slug'    => 'return-policy',
                'content' => '<h3>1. Return Window</h3><p>If you receive any damaged or rotten fruits/vegetables, please inform our support within 6 hours of delivery with proof.</p><h3>2. Refunds</h3><p>Once verified, your refund will be processed, and a credit will automatically be applied to your original payment method within 3 days.</p>',
            ]
        ];


        foreach ($pages as $page) {
            DB::table('pages')->insert([
                'title'      => $page['title'],
                'slug'       => $page['slug'],
                'content'    => $page['content'],
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
