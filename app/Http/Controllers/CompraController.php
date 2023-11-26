<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompraValidacion;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\RequerimientoCompra;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caja;
use Illuminate\Support\Facades\Auth;
use App\Models\Proveedor;




class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();
        return view("panel.Compra.lista_compra.index", compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $user = Auth::user();
        $cajas = Caja::all();
        $proveedores = Proveedor::all();
        $requerimientos = RequerimientoCompra::all();

        return view('panel.compra.lista_compra.create', compact('user', 'cajas', 'proveedores', 'requerimientos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompraValidacion $request)
    {   
        
        
        // Obtener el num_comp de la última compra
        $ultimaCompra = Compra::latest('num_comp')->first();
        $ultimoNumComp = $ultimaCompra ? $ultimaCompra->num_comp : 0;
    

    
        $compra = new Compra();
        $compra->num_comp = $ultimoNumComp + 1;
        $compra->fecha_comp = $request->get('fecha_comp');
        $compra->hora_comp = $request->get('hora_comp');
        $compra->proveedor_id = $request->get('proveedor_id');
        $compra->operador = $request->get('operador');
        $compra->caja_id = $request->get('caja_id');
        $compra->monto_comp = $request->get('monto_comp');
        $compra->detalle = $request->get('detalle');
        $compra->requerimiento_compra_id = $request->input('requerimiento_compra_id');
        
        $compra->save();

        $requerimiento_id = $request->get('requerimiento_compra_id');
        $requerimiento = RequerimientoCompra::find($requerimiento_id);
        $requerimiento->estado_requer_comp = 'Aprobado';
        $requerimiento->update();

        $filas = $request->get('filas');
        $producto_id = $request->input('producto_id');
        $cantidad_requer_prod = $request->input('cantidad_requer_prod');
        $precio_uni_prod = $request->input('precio_uni_prod');
        
        for ($i = 0; $i < $filas; $i++) {
            $productoId = $producto_id[$i];
            $cantidad = $cantidad_requer_prod[$i];
            $precio = $precio_uni_prod[$i];

            $producto = Producto::find($productoId);
            $producto->stock_actual_prod += $cantidad;
            $producto->precio_uni_prod = $precio;
            $producto->update();
        }

        $totalMonto = $compra->monto_comp;

        $cajaAbierta = Caja::where('abierta_caja', 'Si')->first();
        
        if ($cajaAbierta) {
            $cajaAbierta->total_egresos_caja += $totalMonto;
        
            $cajaAbierta->total_saldo_caja = $cajaAbierta->saldo_inicial_caja + $cajaAbierta->total_ingresos_caja - $cajaAbierta->total_egresos_caja;
            
            $cajaAbierta->save();
        }

        return redirect()->route("compra.index")->with('alert', 'Compra realizada exitosamente');;
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
        $compra = Compra::with('RequerimientoCompra.DetalleRequerCompra.producto')->findOrFail($id);
        $requerimiento = $compra->RequerimientoCompra;

        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.Compra.lista_compra.show', compact('compra', 'requerimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
