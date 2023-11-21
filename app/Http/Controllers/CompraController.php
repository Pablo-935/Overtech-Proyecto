<?php

namespace App\Http\Controllers;

use App\Models\Compra;
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

        return view('panel.compra.lista_compra.create', compact('user', 'cajas', 'proveedores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fila = $request->get('contador');
    
        // Obtener el num_comp de la última compra
        $ultimaCompra = Compra::latest('num_comp')->first();
        $ultimoNumComp = $ultimaCompra ? $ultimaCompra->num_comp : 0;
    
        // Inicializa el total de monto_comp en 0
        $totalMontoComp = 0;
    
        for ($i = 0; $i < $fila; $i++) {
            $compra = new Compra();
            $compra->num_comp = $ultimoNumComp + 1; // Sumar 1 al último num_comp
            $compra->monto_comp = $request->get('monto_comp')[$i];
            $compra->detalle = $request->get('detalle')[$i];
            $compra->requerimiento_compra_id = $request->get('requerimiento_compra_id')[$i];
            $compra->fecha_comp = $request->get('fecha_comp')[$i];
            $compra->hora_comp = $request->get('hora_comp')[$i];
            $compra->caja_id = $request->get('caja_id')[$i];
            $compra->proveedor_id = $request->get('proveedor_id')[$i];
            $compra->operador = $request->get('operador')[$i];
    
            $compra->save();
    
            // Suma el monto_comp al total
            $totalMontoComp += $compra->monto_comp;
        }
    
        // Actualiza la caja solo si hay una caja abierta
        $cajaAbierta = Caja::where('abierta_caja', 'Si')->first();
        if ($cajaAbierta) {
            // Suma el total de monto_comp a los egresos en la caja
            $cajaAbierta->total_egresos_caja += $totalMontoComp;
    
            // Actualiza el total del saldo en la caja
            $cajaAbierta->total_saldo_caja = $cajaAbierta->saldo_inicial_caja + $cajaAbierta->total_ingresos_caja - $cajaAbierta->total_egresos_caja;
            
            // Guarda los cambios
            $cajaAbierta->save();
        }
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
