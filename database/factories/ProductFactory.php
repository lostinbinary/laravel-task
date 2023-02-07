<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_code' => $this->faker->unique()->name(),
            'description' => $this->faker->text(255),
            'price' => $this->faker->numberBetween(10, 1000),
            'quantity' => $this->faker->numberBetween(10, 30)
        ];
    }
}
