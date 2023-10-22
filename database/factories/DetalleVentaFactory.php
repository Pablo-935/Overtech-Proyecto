<?php

namespace Database\Factories;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleVenta>
 */
class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $venta = Venta::inRandomOrder()->first();
        $producto = Producto::inRandomOrder()->first();

        return [
            'cantidad_prod_venta' => $this->faker->numberBetween(1, 10),
            'sub_total_det_venta' => $this->faker->randomFloat(2, 10, 1000),
            'venta_id' => $venta->id,
            'producto_id' => $producto->id,
        ];
    }
}
