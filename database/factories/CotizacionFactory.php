<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotizacion>
 */
class CotizacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_cotizacion' => $this->faker->sentence(6), // Genera una frase aleatoria de 6 palabras
            'valor_cotizacion' => $this->faker->randomFloat(2, 1000, 10000), // Número flotante aleatorio con 2 decimales en el rango [1000, 10000]
        ];
    }
}
