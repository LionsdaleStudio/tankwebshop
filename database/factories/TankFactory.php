<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tank>
 */
class TankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->firstNameMale(),
            "crewnumber" => fake()->numberBetween(2,6),
            "country" => fake()->country(),
            "wars" => fake()->numberBetween(1,2),
            "releaseyear" => fake()->year(),
            "cost" => fake()->randomFloat(2,500,2000),
            "description" => fake()->sentences(5, true),
            "active" => fake()->boolean(),
            "tanktype_id" => fake()->numberBetween(1,4)
        ];
    }
}
