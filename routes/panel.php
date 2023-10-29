<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaProductoController;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('/cotizacion', CotizacionController::class)->names('cotizacion');
Route::resource('/proveedor', ProveedorController::class)->names('proveedor');

Route::get('/vista', function(){
    return view('prueba.vista2');
});

Route::resource('/categorias', CategoriaProductoController::class)->names('categoria');
Route::resource('/empleados', EmpleadoController::class)->names('empleado');
Route::resource('/ventas', VentaController::class)->names('venta');

?>