<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Caja;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $caja = Caja::inRandomOrder()->first();
        $cliente = Cliente::inRandomOrder()->first();

        return [
            'dni_venta' => $this->faker->randomNumber(8),
            'fecha_venta' => $this->faker->date(),
            'hora_venta' => $this->faker->time(),
            'total_venta' => $this->faker->randomFloat(2, 10, 1000),
            'estado_venta' => $this->faker->randomElement(['Pendiente', 'Completada', 'Cancelada']), // Estado aleatorio

            'user_id' => $user->id,
            'caja_id' => $caja->id,
            'cliente_id' => $cliente->id,
        ];
    }
}
