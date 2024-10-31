<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'phone' => '1234567890',
            'image' => 'default.png',
            'address' => 'Admin Address',
        ]);
        

        $seller = User::create([
            'name' => 'Seller',
            'email' => 'seller2@seller.com',
            'password' => bcrypt('seller'),
            'role' => 'seller',
            'phone' => '1234567890',
            'image' => 'default.png',
            'address' => 'Seller Address',
        ]);
        Seller::create([
            'seller_id' => $seller->id,
        ]);
    }
} 
