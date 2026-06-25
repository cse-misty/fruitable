<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('faqs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $generalId  = DB::table('faq_catagories')->where('name', 'General Questions')->value('id') ?? 1;
        $shippingId = DB::table('faq_catagories')->where('name', 'Shipping & Delivery')->value('id') ?? 2;
        $paymentId  = DB::table('faq_catagories')->where('name', 'Orders & Payments')->value('id') ?? 3;
        $returnsId  = DB::table('faq_catagories')->where('name', 'Returns & Refunds')->value('id') ?? 4;

        $faqs = [
            // General Questions
            [
                'question'        => 'Are your fruits and vegetables 100% organic?',
                'answer'          => 'Yes, all our products are sourced directly from certified organic farms and are 100% chemical and pesticide-free.',
                'faq_category_id' => $generalId,
                'position'        => 1,
            ],
            // Shipping & Delivery
            [
                'question'        => 'How long does it take to deliver my order?',
                'answer'          => 'For inside Dhaka, we deliver within 24 hours. For outside Dhaka, it may take 48 to 72 hours.',
                'faq_category_id' => $shippingId,
                'position'        => 2,
            ],
            [
                'question'        => 'What are the delivery charges?',
                'answer'          => 'Our standard delivery charge inside Dhaka is 60 BDT and outside Dhaka is 120 BDT. Free delivery applies to orders above 1500 BDT.',
                'faq_category_id' => $shippingId,
                'position'        => 3,
            ],
            // Orders & Payments
            [
                'question'        => 'What payment methods do you accept?',
                'answer'          => 'We accept Cash on Delivery (COD), bKash, Nagad, Rocket, and all major credit/debit cards through our secure payment gateway.',
                'faq_category_id' => $paymentId,
                'position'        => 4,
            ],
            // Returns & Refunds
            [
                'question'        => 'What is your refund policy for damaged goods?',
                'answer'          => 'If you receive any damaged or rotten products, please inform our support within 6 hours of delivery with a photo. We will refund or replace the item immediately.',
                'faq_category_id' => $returnsId,
                'position'        => 5,
            ]
        ];

        foreach ($faqs as $faq) {
            DB::table('faqs')->insert([
                'question'        => $faq['question'],
                'answer'          => $faq['answer'],
                'faq_category_id' => $faq['faq_category_id'],
                'status'          => 1,
                'position'        => $faq['position'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
