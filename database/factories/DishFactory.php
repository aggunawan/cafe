<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText('10'),
            'description' => $this->faker->realText('45'),
            'price' => $this->faker->randomNumber(2) * 1000,
        ];
    }
}
