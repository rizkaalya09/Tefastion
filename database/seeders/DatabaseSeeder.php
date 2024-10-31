<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Sale;
use App\Models\Wallet;
use App\Models\Customer;
use App\Models\Seller;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // Call the CategorySeeder
        $this->call(CategorySeeder::class);

        // Create 10 customers
        User::factory()->count(10)->create(['role' => 'customer'])->each(function ($user) {
            Customer::create(['customer_id' => $user->id]);
        });


        // Create 10 sellers, each with 5 products
        User::factory()->count(10)->create(['role' => 'seller'])->each(function ($user) {
            $seller = Seller::create(['seller_id' => $user->id]);
            Product::factory()->count(5)->create(['seller_id' => $seller->seller_id]);
        });
    }
}
