<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $slider1_images = json_encode(['hero-img-1.png']);
        $slider2_images = json_encode(['hero-img-2.jpg']);

        DB::table('hero_sliders')->updateOrInsert(
            ['id' => 1],
            [
                'image'      => $slider1_images,
                'sub_title'  => '100% Organic Foods',
                'main_title' => 'Organic Veggies & Fruits Foods',
                'badge_text' => 'Organic Fruits',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('hero_sliders')->updateOrInsert(
            ['id' => 2],
            [
                'image'      => $slider2_images,
                'sub_title'  => 'Fresh Exotic Fruits',
                'main_title' => 'Get Fresh Fruits To Your Doorstep',
                'badge_text' => 'Vegetables',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
