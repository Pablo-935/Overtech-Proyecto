<?php

namespace App\Http\Controllers;

use App\Models\DetalleRequerComp;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\RequerimientoCompra;
use Illuminate\Http\Request;

class RequerimientoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requerimientos = RequerimientoCompra::all();
        return view('panel.RequerimientoCompra.lista_requerimiento.index', compact('requerimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        $productos = Producto::all();
        
        return view('panel.RequerimientoCompra.lista_requerimiento.create', compact('empleados', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requerimiento = new RequerimientoCompra();

        $requerimiento->fecha_requer_comp = $request->get('fecha_requer_comp');
        $requerimiento->estado_requer_comp = $request->get('estado_requer_comp');
        $requerimiento->empleado_id = $request->get('empleado_id');
        
        $requerimiento->save();

        $filas = $request->get('filas');
        $producto_id = $request->input('producto_id');
        $cantidad_requer_prod = $request->input('cantidad_requer_prod');
        

        for ($i = 0; $i < $filas; $i++) {
            $detalleRequerimiento = new DetalleRequerComp();
            $detalleRequerimiento->producto_id = $producto_id[$i];
            $detalleRequerimiento->cantidad_requer_prod = $cantidad_requer_prod[$i];
            $requerimiento->DetalleRequerCompra()->save($detalleRequerimiento);
        }


        // $detalleRequerimiento = new DetalleRequerComp();
        // $detalleRequerimiento->producto_id = $request->get('producto_id');
        // $detalleRequerimiento->cantidad_requer_prod = $request->get('cantidad_requer_prod');
        // $requerimiento->DetalleRequerCompra()->save($detalleRequerimiento);
        
        return redirect()->route("requerimiento.index");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $requerimiento = RequerimientoCompra::findOrFail($id);
        
        $detalleRequerimiento = DetalleRequerComp::where('requerimiento_compra_id', $id)->get();
        
        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.RequerimientoCompra.lista_requerimiento.show', compact('requerimiento', 'detalleRequerimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requerimiento = RequerimientoCompra::findOrFail($id);
        $detalleRequerimiento = DetalleRequerComp::where('requerimiento_compra_id', $id)->get();
        $empleados = Empleado::all();
        $productos = Producto::all();
        
        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.RequerimientoCompra.lista_requerimiento.edit', compact('requerimiento', 'detalleRequerimiento', 'empleados', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requerimiento = RequerimientoCompra::findOrFail($id);
        $requerimiento->fecha_requer_comp = $request->input('fecha_requer_comp');
        $requerimiento->estado_requer_comp = $request->input('estado_requer_comp');
        $requerimiento->empleado_id = $request->input('empleado_id');

        $requerimiento->update();
        
        $filas = $request->get('filas');
        $producto_id = $request->input('producto_id');
        $cantidad_requer_prod = $request->input('cantidad_requer_prod');

        $detalle = $request->input('detalle');
        for ($i = 0; $i < $filas; $i++) {
            $detalleRequerimiento = DetalleRequerComp::where('requerimiento_compra_id', $id)
                ->where('id', $detalle[$i]) // Asumiendo que hay un campo llamado 'detalle_requerimiento_id' en tu formulario
                ->update([
                    'producto_id' => $request->input('producto_id')[$i],
                    'cantidad_requer_prod' => $request->input('cantidad_requer_prod')[$i],
                ]);
        }
        
        // Actualización de detalle de venta
        return redirect()->route("requerimiento.index");

        
        // for ($i = 0; $i < $filas; $i++) {
        //     $detalleRequerimiento = DetalleRequerComp::where('requerimiento_compra_id', $id)->update([
        //         'producto_id' => $producto_id[$i],
        //         'cantidad_requer_prod' => $cantidad_requer_prod[$i],
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd('ggg');
        $requerimiento = RequerimientoCompra::findOrFail($id);
        $requerimiento->delete();
        return redirect()->route("requerimiento.index")->with('alert3', 'Requerimiento Eliminado');

    }
}
