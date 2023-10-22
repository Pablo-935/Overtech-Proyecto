<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $usuario = User::inRandomOrder()->first();

        return [
            'dni_empl' => $this->faker->unique()->randomNumber(8),
            'nombre_empl' => $this->faker->firstName(),
            'apellido_empl' => $this->faker->lastName(),
            'celular_empl' => $this->faker->optional()->phoneNumber(),
            'correo_empl' => $this->faker->unique()->safeEmail(),
            'domicilio_empl' => $this->faker->address(),
            'tipo_empl' => $this->faker->randomElement(['Admin', 'Vendedor', 'Cajero', 'Repositor']),
            'fecha_alta_empl' => $this->faker->date(),
            'fecha_baja_empl' => $this->faker->optional()->date(),
            'user_id' => $usuario->id, // Puedes modificar esto según tus necesidades
        ];
    }
}
