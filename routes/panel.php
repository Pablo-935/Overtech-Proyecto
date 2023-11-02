<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleRequerCompController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RequerimientoCompraController;

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

Route::resource('/categorias', CategoriaProductoController::class)->names('categoria');
Route::resource('/empleados', EmpleadoController::class)->names('empleado');
Route::resource('/ventas', VentaController::class)->names('venta');
Route::resource('/requerimientos', RequerimientoCompraController::class)->names('requerimiento');

Route::resource('/detalleRequerimientos', DetalleRequerCompController::class)->names('detalleRequerimiento');
Route::resource('/compras', CompraController::class)->names('compra');

?>