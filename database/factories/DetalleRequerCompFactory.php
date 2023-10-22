<?php

namespace Database\Factories;
use App\Models\RequerimientoCompra;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleRequerComp>
 */
class DetalleRequerCompFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   

        $requerimientoCompra = RequerimientoCompra::inRandomOrder()->first();
        $producto = Producto::inRandomOrder()->first();

        return [
            'cantidad_requer_prod' => $this->faker->numberBetween(1, 10),
    
            'requerimiento_compra_id' => $requerimientoCompra->id,
            'producto_id' => $producto->id,
        ];
    }
}
