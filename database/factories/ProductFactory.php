<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake();
        return [
            'name' => $faker->name(),
            'price' => $faker->randomFloat(2, 0, 300),
            'description' => $faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
