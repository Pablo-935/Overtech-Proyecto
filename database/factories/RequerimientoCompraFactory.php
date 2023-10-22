<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequerimientoCompra>
 */
class RequerimientoCompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $empleado = Empleado::inRandomOrder()->first();

        return [
            'fecha_requer_comp' => $this->faker->date(),
            'estado_requer_comp' => $this->faker->randomElement(['Pendiente', 'Aprobado', 'Rechazado']), // Estado aleatorio
    
            'empleado_id' => $empleado->id,
        ];
    }
}
