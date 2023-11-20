<?php

use App\Http\Controllers\CajaController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('panel.index');
});
Route::resource('/clientes', ClienteController::class)->names('cliente');
Route::resource('/categorias', CategoriaProductoController::class)->names('categoria');
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/cotizacion', CotizacionController::class)->names('cotizacion');
Route::resource('/proveedor', ProveedorController::class)->names('proveedor');

Route::get('/vista', function(){
    return view('prueba.vista2');
});

Route::resource('/empleados', EmpleadoController::class)->names('empleado');
Route::resource('/ventas', VentaController::class)->names('venta');
Route::put('/anular/{id}', [VentaController::class, 'anular'])->name('anular');
Route::resource('/caja', CajaController::class)->names('caja');

Route::get('/exportar-productos-excel', [ProductoController::class, 'exportarProductosExcel'])->name
('exportar-productos-excel');
Route::get('/graficos-ventas', [VentaController::class, 'graficoVentas'])->name
('graficos-ventas');
Route::get('/grafico-ingegre', [CajaController::class, 'graficoIngresosegresos'])->name
('grafico-ingegre');

?>