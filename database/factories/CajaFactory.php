<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caja>
 */
class CajaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'numero_caja' => $this->faker->randomNumber(4),
            'saldo_inicial_caja' => $this->faker->randomFloat(2, 100, 10000),
            'fecha_hs_aper_caja' => $this->faker->date(),
            'fecha_hs_cier_caja' => $this->faker->optional()->date(),
            'total_ingresos_caja' => $this->faker->randomFloat(2, 0, 5000),
            'total_egresos_caja' => $this->faker->randomFloat(2, 0, 5000),
            'total_saldo_caja' => $this->faker->randomFloat(2, 0, 5000),
            'abierta_caja' => $this->faker->randomElement(['Si', 'No']), // Opción aleatoria entre "Si" y "No"
            'user_id' => $user->id,
        ];
    }
}
