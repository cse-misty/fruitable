<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('about_us')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('about_us')->insert([
            'sub_title'         => 'Who We Are',
            'title'             => 'About Our Fruitables Organic Shop',
            'description_top'   => '<p>We are dedicated to providing you the best of fresh organic fruits and vegetables, with a focus on dependability, customer service, and unique quality. Our products are sourced directly from certified local farms to ensure health and hygiene.</p>',
            'description_bottom'=> '<p>Every product is hand-picked and carefully inspected before delivery. We believe in building a healthy community through sustainable agriculture and healthy eating habits.</p>',
            'image'             => 'https://unsplash.com',
            'experience_year'   => '10+',
            'experience_text'   => 'Years of Freshness',

            // Mission, Vision & Values
            'mission_title'     => 'Our Mission',
            'mission_description' => 'To make 100% fresh, organic, and chemical-free fruits and vegetables accessible to every household while supporting sustainable farming practices.',
            'vision_title'      => 'Our Vision',
            'vission_description' => 'To become the leading trusted e-commerce platform for health-conscious consumers looking for organic farm-fresh nutrition.',
            'core_value_title'  => 'Our Core Values',
            'core_value_description' => 'Integrity, Quality and Trust. We maintain deep transparency from farm production to home delivery, ensuring maximum satisfaction.',

            'status'            => 1, 
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
