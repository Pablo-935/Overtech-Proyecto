<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Empleado;
use App\Models\Caja;
use App\Models\Cliente;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('panel.venta.lista_venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $empleados = Empleado::all();
        $cajas = Caja::all();
        $clientes = Cliente::all();

        return view('panel.venta.lista_venta.create', compact('productos', 'empleados', 'cajas', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $ventas = new Venta();

        $ventas->dni_venta = $request->get('dni_venta');
        $ventas->fecha_venta = $request->get('fecha_venta');
        $ventas->hora_venta = $request->get('hora_venta');
        $ventas->total_venta = $request->get('total_venta');
        $ventas->estado_venta = $request->get('estado_venta');
        $ventas->empleado_id = $request->get('empleado_id');
        $ventas->caja_id = $request->get('caja_id');
        $ventas->cliente_id = $request->get('cliente_id');
        $ventas->save();

        $detalleVenta = new DetalleVenta();
        $detalleVenta->producto_id = $request->get('producto_id');
        $detalleVenta->cantidad_prod_venta = $request->get('cantidad_prod_venta');
        $detalleVenta->sub_total_det_venta = $request->get('sub_total_det_venta');

        $ventas->DetalleVenta()->save($detalleVenta);
        
        return redirect()->route("venta.index");

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
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
