<?php

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

?>