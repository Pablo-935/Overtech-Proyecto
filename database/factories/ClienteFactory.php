<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cuit_cli' => $this->faker->unique()->numerify('#############'), // Genera un número de 13 dígitos aleatorio y único
            'nombre_cli' => $this->faker->name(),
            'celular_cli' => $this->faker->phoneNumber(),
        ];
    }
}
