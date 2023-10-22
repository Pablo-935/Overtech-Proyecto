<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_prov' => $this->faker->company(), // Genera un nombre de empresa aleatorio
            'telefono_prov' => $this->faker->phoneNumber(), // Genera un número de teléfono aleatorio
            'direccion_prov' => $this->faker->streetAddress(), // Genera una dirección aleatoria
            'ubicacion_prov' => $this->faker->city(), // Genera una ubicación (ciudad) aleatoria
            'correo_prov' => $this->faker->unique()->safeEmail(), // Genera un correo electrónico aleatorio y único
        ];
    }
}
