<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ProveedorController;
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

Route::resource('/categorias', CategoriaProductoController::class)->names('categoria');

?>