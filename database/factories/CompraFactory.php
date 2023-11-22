<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Caja;
use App\Models\Proveedor;
use App\Models\RequerimientoCompra;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compra>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $caja = Caja::inRandomOrder()->first();
        $proveedor = Proveedor::inRandomOrder()->first();
        $requerimientoCompra = RequerimientoCompra::inRandomOrder()->first();

        return [
            'num_comp' => $this->faker->unique()->randomNumber(4),
            'monto_comp' => $this->faker->randomFloat(2, 100, 10000),
            'fecha_comp' => $this->faker->date(),
            'hora_comp' => $this->faker->time(),
            'detalle' => $this->faker->paragraph(),
            'operador' => $this->faker->name(),
    
            'caja_id' => $caja->id,
            'proveedor_id' => $proveedor->id,
            'requerimiento_compra_id' => $requerimientoCompra->id,
        ];
    }
}
