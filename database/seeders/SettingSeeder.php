<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('web_settings')->updateOrInsert(
            ['id' => 1],
            [
                // Basic Information
                'site_name' => 'Fruitables',
                'site_title' => 'Fruitables Fresh & Organic ',
                'meta_keywords' => 'organic, fruits, vegetables',
                'email_primary' => 'info@fruitables.com',
                'meta_description' => '<p>Fruitable is your premium online shop for <strong>100% organic and fresh fruits</strong>. We guarantee chemical-free, fresh delivery directly from the farm to your doorstep.</p>',

                // Contact Information
                'phone_1' => '+8801700000000',
                'phone_2' => '+8801900000000',
                'email_support' => 'support@fruitables.com',
                'address' => '123 Street, Dhaka, Bangladesh',
                'google_map_url' => 'https://google.com!',

                // Social Media Links
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'youtube_url' => 'https://youtube.com',
                'instagram_url' => 'https://instagram.com',
                'copyright_text' => '© Fruitables, All rights reserved.',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
