<?php


use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleRequerCompController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CajaController;
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

Route::resource('/empleados', EmpleadoController::class)->names('empleado');


Route::get('/empleados/all', [EmpleadoController::class, 'all'])->name('empleados.all');

Route::resource('/caja', CajaController::class)->names('caja');

Route::resource('/ventas', VentaController::class)->names('venta');
Route::resource('/requerimientos', RequerimientoCompraController::class)->names('requerimiento');
Route::get('/exportar-requerimientos-pdf/{id}', [RequerimientoCompraController::class, 'exportarRequerimientoPDF'])->name('exportar-requerimientos-pdf');
Route::get('/exportar-productos-excel', [ProductoController::class, 'exportarProductosExcel'])->name('exportar-productos-excel');
Route::get('/productos-bajos-stock', [RequerimientoCompraController::class, 'cargarProductosBajoStock'])->name('productos-bajos-stock');
Route::get('/grafico-ingegre', [CajaController::class, 'GraficoIngresosegresos'])->name('grafico-ingegre');
Route::get('/graficos-ventas', [VentaController::class, 'graficoVentas'])->name('graficos-ventas');


Route::delete('/detalleRequerimientos/{id}', [DetalleRequerCompController::class, 'destroy'])->name('detalleRequerimiento.destroy');
// Route::resource('/detalleRequerimientos', DetalleRequerCompController::class)->names('detalleRequerimiento');

Route::resource('/compras', CompraController::class)->names('compra');

// Email
Route::get('/mails/form', [MailController::class, 'index'])->name('mails.form');
Route::post('/mails/send-mail', [MailController::class, 'sendMail'])->name('mails.send-mail');

?>