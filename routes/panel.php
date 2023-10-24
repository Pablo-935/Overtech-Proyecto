<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('/cotizacion', CotizacionController::class)->names('cotizacion');
Route::resource('/proveedor', ProveedorController::class)->names('proveedor');

Route::get('/vista', function(){
    return view('prueba.vista2');
});

?>