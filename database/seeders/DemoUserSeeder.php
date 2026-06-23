<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('DEMO_USER_EMAIL', 'root@example.com');
        $password = env('DEMO_USER_PASSWORD', 'secret@123');


        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Demo Customer',
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );
    }
}
