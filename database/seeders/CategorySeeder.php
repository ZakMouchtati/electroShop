<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Laptops', 'Smartphones', 'Cameras', 'Accessories'];
        foreach ($categories as $name) {
            $catory = new Category();
            $catory->name = $name;
            $catory->save();
        }
    }
}
