<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            "name" => $name,
            "slug" => Str::slug($name, "-"),
            "price" => $this->faker->numberBetween(50, 980),
            "stock_quantity" => $this->faker->numberBetween(0, 30),
            "description" => $this->faker->text(300)

        ];
    }
}
