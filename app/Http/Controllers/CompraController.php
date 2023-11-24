<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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
        $compra->caja_id = $request->get('caja');
        $compra->monto_comp = $request->get('monto_comp');
        $compra->detalle = $request->get('detalle');
        $compra->requerimiento_compra_id = $request->input('requerimiento_compra_id');
        
        $compra->save();

        $filas = $request->get('filas');
        $producto_id = $request->input('producto_id');
        $cantidad_requer_prod = $request->input('cantidad_requer_prod');
        
        for ($i = 0; $i < $filas; $i++) {
            $productoId = $producto_id[$i];
            $cantidad = $cantidad_requer_prod[$i];

            $producto = Producto::find($productoId);
            $producto->stock_actual_prod += $cantidad;
            $producto->update();
        }

        return redirect()->route("compra.index");
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compra = Compra::findOrFail($id);

        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.Compra.lista_compra.show', compact('compra'));
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
