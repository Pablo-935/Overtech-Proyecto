<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CategoriaProductoSeeder::class);
        $this->call(CotizacionSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(VentaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(DetalleVentaSeeder::class);
        $this->call(RequerimientoCompraSeeder::class);
        $this->call(DetalleRequerCompSeeder::class);
        $this->call(CompraSeeder::class);
            
    }
}
