<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaProductoController;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('/categorias', CategoriaProductoController::class)->names('categoria');

?>