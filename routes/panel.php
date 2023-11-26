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
Route::resource('/clientes', ClienteController::class)->names('cliente')->middleware('can:lista_clientes');
Route::resource('/categorias', CategoriaProductoController::class)->names('categoria')->middleware('can:lista_categorias');
Route::resource('/productos', ProductoController::class)->names('producto')->middleware('can:lista_productos');
Route::resource('/cotizacion', CotizacionController::class)->names('cotizacion')->middleware('can:lista_cotizaciones');
Route::resource('/proveedor', ProveedorController::class)->names('proveedor')->middleware('can:lista_proveedores');

Route::resource('/empleados', EmpleadoController::class)->names('empleado')->middleware('can:lista_empleados');
// Route::get('/empleados/all', [EmpleadoController::class, 'all'])->name('empleados.all');

Route::resource('/caja', CajaController::class)->names('caja')->middleware('can:lista_cajas');

Route::resource('/ventas', VentaController::class)->names('venta')->middleware('can:lista_ventas');
Route::put('/anular/{id}', [VentaController::class, 'anular'])->name('anular');
Route::get('/pdfb/{id}', [VentaController::class, 'pdfb'])->name('pdfb');
Route::get('/pdfa/{id}', [VentaController::class, 'pdfa'])->name('pdfa');
Route::get('/historial', [VentaController::class, 'historial'])->name('historial');
Route::put('/cancelar/{id}', [VentaController::class, 'cancelar'])->name('cancelar');


Route::resource('/requerimientos', RequerimientoCompraController::class)->names('requerimiento')->middleware('can:lista_requerimientos');
Route::get('/exportar-requerimientos-pdf/{id}', [RequerimientoCompraController::class, 'exportarRequerimientoPDF'])->name('exportar-requerimientos-pdf');
Route::get('/exportar-productos-excel', [ProductoController::class, 'exportarProductosExcel'])->name('exportar-productos-excel');
Route::get('/productos-bajos-stock', [RequerimientoCompraController::class, 'cargarProductosBajoStock'])->name('productos-bajos-stock');
Route::delete('/detalleRequerimientos/{id}', [DetalleRequerCompController::class, 'destroy'])->name('detalleRequerimiento.destroy');

Route::get('/grafico-ingegre', [CajaController::class, 'GraficoIngresosegresos'])->name('grafico-ingegre');
Route::get('/graficos-ventas', [VentaController::class, 'graficoVentas'])->name('graficos-ventas');


Route::resource('/compras', CompraController::class)->names('compra')->middleware('can:lista_compras');;

// Email
Route::get('/mails/form', [MailController::class, 'index'])->name('mails.form')->middleware('can:lista_mails');
Route::post('/mails/send-mail', [MailController::class, 'sendMail'])->name('mails.send-mail');

?>