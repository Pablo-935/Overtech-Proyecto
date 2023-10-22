<?php

namespace Database\Factories;

use App\Models\CategoriaProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoria = CategoriaProducto::inRandomOrder()->first();
        
        return [
            'codigo_prod' => $this->faker->unique()->ean13(), // Genera un código EAN-13 único
            'nombre_prod' => $this->faker->word(),
            'descripcion_prod' => $this->faker->paragraph(),
            'precio_uni_prod' => $this->faker->randomFloat(2, 10, 1000),
            'stock_min_prod' => $this->faker->numberBetween(1, 100),
            'stock_actual_prod' => $this->faker->numberBetween(1, 100),
            'stock_max_prod' => $this->faker->numberBetween(101, 200),
            'imagen_prod' => $this->faker->imageUrl(640, 480), // URL de una imagen aleatoria con dimensiones 640x480
            'categoria_id' => $categoria->id,
        ];
    }
}
