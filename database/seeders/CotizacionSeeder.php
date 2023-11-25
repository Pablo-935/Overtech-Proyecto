<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cotizacion;
class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cotizacion::create([
            'nombre_cotizacion' => 'DOLAR',
            'valor_cotizacion' => '370',
        ]);
        
        Cotizacion::create([
            'nombre_cotizacion' => 'VENTA',
            'valor_cotizacion' => '30',
        ]);
}
}