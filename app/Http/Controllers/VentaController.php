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
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::orderBy('id', 'desc')->get();

        // $ventas = Venta::where('estado_venta', 'Pendiente')->orderBy('id', 'desc')->get();
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
    public function show()
    {
        $ventas = Venta::where('estado_venta', 'Pendiente')->orderBy('id', 'desc')->get();
        return view('panel.venta.lista_venta.show', compact('ventas'));

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
    $cajaAbierta = Caja::where('abierta_caja', 'Si')->first();

    if ($cajaAbierta) {
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
    
        $producto = Producto::findOrFail($request->input('producto_id')[$i]);
    
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

$cajaAbierta = Caja::where('abierta_caja', 'Si')->first();

if ($cajaAbierta) {
    $cajaAbierta->total_egresos_caja += $totalVenta;

    $cajaAbierta->total_saldo_caja = $cajaAbierta->saldo_inicial_caja + $cajaAbierta->total_ingresos_caja - $cajaAbierta->total_egresos_caja;
    
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
    
        $producto = Producto::findOrFail($request->input('producto_id')[$i]);
    
        if ($cantidad == 0) {
            $detalleVenta->delete();
        } else {
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

    public function graficoVentas(Request $request)
    {
        if($request->ajax()) {
            $labels = [];
            $counts = [];
            
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
    
            $ventasPorDia = DB::table('ventas')
                ->select(DB::raw('DATE(fecha_venta) as fecha'), DB::raw('COUNT(*) as total_ventas'))
                ->whereBetween('fecha_venta', [$fechaInicio, $fechaFin])
                ->groupBy(DB::raw('DATE(fecha_venta)'))
                ->orderBy(DB::raw('DATE(fecha_venta)'))
                ->get();
    
            foreach($ventasPorDia as $venta) {
                $labels[] = $venta->fecha;
                $counts[] = $venta->total_ventas;
            }
    
            $response = [
                'success' => true,
                'data' => [$labels, $counts]
            ];
    
            return json_encode($response);
        }
    
        return view('panel.venta.lista_venta.grafico_ventas');
    }
    

    
    public function pdfb ($id){
        set_time_limit(300);
        $ventaB = Venta::findOrFail($id);
        $ventaB->load(['DetalleVenta']); 

        $pdf = PDF::loadView('panel.venta.lista_venta.pdfb', compact('ventaB'));
        $pdf->render();
        return $pdf->stream('Factura_B.pdf');
    }


    public function pdfa ($id){
        set_time_limit(300);
        $ventaA = Venta::findOrFail($id);
        $ventaA->load(['DetalleVenta']); 

        $pdf = PDF::loadView('panel.venta.lista_venta.pdfa', compact('ventaA'));
        $pdf->render();
        return $pdf->stream('Factura_A.pdf');
    }



}