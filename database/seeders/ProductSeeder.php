<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $categories = Category::all();
        Product::factory(20)->make()->each(function ($product) use ($users, $categories) {
            $product->user_id = $users->random()->id;
            $product->category_id = $categories->random()->id;
            $product->save();
        });
    }
}
