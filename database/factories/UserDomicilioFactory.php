<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDomicilio>
 */
class UserDomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'domicilio' => fake()->streetAddress(),
            'numero_exterior' => rand(1,1000),
            'colonia' => fake()->citySuffix(),
            'cp' => rand(10000, 99999),
            'ciudad' => fake()->city(),
        ];
    }
}
