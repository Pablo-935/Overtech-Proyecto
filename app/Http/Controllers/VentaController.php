<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaValdacion;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Caja;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::orderBy('id', 'desc')->get();
        return view('panel.venta.lista_venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $user = User::all();
        $user = Auth::user();
        $cajas = Caja::all();
        $clientes = Cliente::all();
        $cotizacion = Cotizacion::all();

        return view('panel.venta.lista_venta.create', compact('productos', 'user', 'cajas', 'clientes', 'cotizacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaValdacion $request)
    {   

        $ventas = new Venta();

        $ventas->dni_venta = $request->get('dni_venta');
        $ventas->fecha_venta = $request->get('fecha_venta');
        $ventas->hora_venta = $request->get('hora_venta');
        $ventas->total_venta = $request->get('total_venta');
        $ventas->estado_venta = $request->input('estado_venta', 'Pendiente');
        $ventas->user_id = $request->get('empleado_id');
        $ventas->caja_id = $request->get('caja_id');
        $ventas->cliente_id = $request->get('cliente_id');
        $ventas->save();

        $fila = $request->get('contador');

        for ($i=0; $i < $fila; $i++) { 
            $detalleVenta = new DetalleVenta();
            $detalleVenta->producto_id = $request->get('id_producto')[$i];
            $detalleVenta->cantidad_prod_venta = $request->get('cantidad_prod_venta')[$i];
            $detalleVenta->sub_total_det_venta = $request->get('sub_total')[$i];
    
            $ventas->DetalleVenta()->save($detalleVenta);
        }


        return redirect()->route('venta.create')->with('alert1', 'Venta Guardada Satisfactoriamente !!');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        
        
        $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        

        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.venta.lista_venta.show', compact('venta', 'detalleVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        $productos = Producto::all();
        $user = Auth::user();
        $cajas = Caja::all();
        $clientes = Cliente::all();
        $cotizacion = Cotizacion::all();

        return view('panel.venta.lista_venta.edit', compact('venta', 'detalleVenta', 'productos', 'user', 'cajas', 'clientes', 'cotizacion'));

    }


public function update(Request $request, $id)
{
    $venta = Venta::findOrFail($id);

    $venta->dni_venta = $request->input('dni_venta');
    $venta->fecha_venta = $request->input('fecha_venta');
    $venta->hora_venta = $request->input('hora_venta');
    $venta->total_venta = $request->input('total_venta');
    $venta->estado_venta = $request->filled('estado_venta') ? $request->input('estado_venta') : 'Facturado';
    $venta->user_id = $request->input('empleado_id');
    $venta->caja_id = $request->input('caja_id');
    $venta->cliente_id = $request->input('cliente_id');
    $venta->save();

    $fila = $request->get('contador');
    $detalleid = $request->get("detalle_venta_id");



    $totalVenta = $venta->total_venta;
    // Obtener la caja abierta
    $cajaAbierta = Caja::where('abierta_caja', 'Si')->first();

    // Verificar si se encontró una caja abierta
    if ($cajaAbierta) {
        // Actualizar el total de ingresos en la caja
        $cajaAbierta->total_ingresos_caja += $totalVenta;
        $cajaAbierta->total_saldo_caja = $cajaAbierta->saldo_inicial_caja + $cajaAbierta->total_ingresos_caja - $cajaAbierta->total_egresos_caja;
        $cajaAbierta->save();
    }


    for ($i=0; $i < $fila; $i++) { 
        $detalleVenta = DetalleVenta::where('venta_id', $id)
            ->where('id', $detalleid[$i])
            ->update([
                'producto_id' => $request->input('producto_id')[$i],
                'cantidad_prod_venta' => $request->input('cantidad_prod_venta')[$i],
                'sub_total_det_venta' => $request->input('sub_total_det_venta')[$i]
            ]);
    
        // Obtener el producto asociado al detalle de venta
        $producto = Producto::findOrFail($request->input('producto_id')[$i]);
    
        // Actualizar el stock del producto
        $nuevoStock = $producto->stock_actual_prod - $request->input('cantidad_prod_venta')[$i];
        $producto->stock_actual_prod = max(0, $nuevoStock);
        $producto->save();
    }
    return back();
}

// =============================================================================

public function anular(Request $request, $id)
{
    $venta = Venta::findOrFail($id);

    $venta->dni_venta = $request->input('dni_venta');
    $venta->fecha_venta = $request->input('fecha_venta');
    $venta->hora_venta = $request->input('hora_venta');
    $venta->total_venta = $request->input('total_venta');
    $venta->estado_venta = $request->filled('estado_venta') ? $request->input('estado_venta') : 'Anulado';
    $venta->user_id = $request->input('empleado_id');
    $venta->caja_id = $request->input('caja_id');
    $venta->cliente_id = $request->input('cliente_id');
    $venta->save();

    $fila = $request->get('contador');
    $detalleid = $request->get("detalle_venta_id");


    $totalVenta = $venta->total_venta;

// Obtener la caja abierta
$cajaAbierta = Caja::where('abierta_caja', 'Si')->first();

// Verificar si se encontró una caja abierta
if ($cajaAbierta) {
    // Sumar el total de la venta a los egresos en la caja
    $cajaAbierta->total_egresos_caja += $totalVenta;

    // Actualizar el total del saldo en la caja
    $cajaAbierta->total_saldo_caja = $cajaAbierta->saldo_inicial_caja + $cajaAbierta->total_ingresos_caja - $cajaAbierta->total_egresos_caja;
    
    // Guardar los cambios
    $cajaAbierta->save();
}



    for ($i = 0; $i < $fila; $i++) {
        $cantidad = $request->input('cantidad_prod_venta')[$i];
    
        $detalleVenta = DetalleVenta::where('venta_id', $id)
            ->where('id', $detalleid[$i])
            ->update([
                'producto_id' => $request->input('producto_id')[$i],
                'cantidad_prod_venta' => $cantidad,
                'sub_total_det_venta' => $request->input('sub_total_det_venta')[$i]
            ]);
    
        // Obtener el producto asociado al detalle de venta
        $producto = Producto::findOrFail($request->input('producto_id')[$i]);
    
        if ($cantidad == 0) {
            // Eliminar el producto del detalle de venta si la cantidad es 0
            $detalleVenta->delete();
        } else {
            // Incrementar o decrementar el stock del producto según la cantidad
            $nuevoStock = $producto->stock_actual_prod + $cantidad;
            $producto->stock_actual_prod = $nuevoStock;
            $producto->save();
        }
    }

    return back();
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->route("venta.index")->with('alert3', 'Venta Eliminada');

    }
}
