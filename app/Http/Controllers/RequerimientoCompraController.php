<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequerimientoCompraValidacion;
use Illuminate\Support\Facades\DB;

use App\Models\DetalleRequerComp;
use App\Models\User;
use App\Models\Producto;
use App\Models\RequerimientoCompra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $usuarios = User::all();
        $productos = Producto::all();
        
        
        return view('panel.RequerimientoCompra.lista_requerimiento.create', compact('usuarios', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequerimientoCompraValidacion $request)
    {
        
        $requerimiento = new RequerimientoCompra();

        $requerimiento->fecha_requer_comp = $request->get('fecha_requer_comp');
        $requerimiento->estado_requer_comp = $request->get('estado_requer_comp');
        $requerimiento->user_id = $request->get('usuario_id');
        
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
        $usuarios = User::all();
        $productos = Producto::all();
        
        // $detalleVenta = DetalleVenta::where('venta_id', $id)->get();
        return view('panel.RequerimientoCompra.lista_requerimiento.edit', compact('requerimiento', 'detalleRequerimiento', 'usuarios', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requerimiento = RequerimientoCompra::findOrFail($id);
        $requerimiento->fecha_requer_comp = $request->input('fecha_requer_comp');
        $requerimiento->estado_requer_comp = $request->input('estado_requer_comp');
        $requerimiento->user_id = $request->input('usuario_id');

        $requerimiento->update();
        
        $filas = $request->get('filas');
        // $producto_id = $request->input('producto_id');
        // $cantidad_requer_prod = $request->input('cantidad_requer_prod');

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requerimiento = RequerimientoCompra::findOrFail($id);
        $requerimiento->delete();
        return redirect()->route("requerimiento.index")->with('alert3', 'Requerimiento Eliminado');

    }


    public function exportarRequerimientoPDF($id){
        set_time_limit(300);
        $requerimiento = RequerimientoCompra::findOrFail($id);
        // $requerimiento = RequerimientoCompra::findOrFail($id)->with('DetalleRequerCompra')->first();
        $requerimiento->load(['DetalleRequerCompra']); 

        // $detalleRequerimiento = DetalleRequerComp::where('requerimiento_compra_id', $id)->get();

        // $pdf = PDF::loadView('panel.RequerimientoCompra.lista_requerimiento.pdf', compact('requerimiento', 'detalleRequerimiento'));
        $pdf = PDF::loadView('panel.RequerimientoCompra.lista_requerimiento.pdf', compact('requerimiento'));
        $pdf->render();
        return $pdf->stream('requerimiento.pdf');
    }

    public function cargarProductosBajoStock(Request $request){
        // dd($productosBajos);
        if( $request->ajax() ) {
            // $productosBajos = Producto::where('stock_actual_prod', '<=', 'stock_min_prod')->get();
            
            // $productosBajos = Producto::where('stock_min_prod', '>', 'stock_actual_prod')->get();
            $productos = Producto::with(['categoria'])->get();
            $productos_bajo_stock = array();
    
            foreach ($productos as $prod){
                if ($prod->stock_min_prod >= $prod->stock_actual_prod) {
                    $productos_bajo_stock[] = $prod;
                }
            }

            // $productosBajos->load(['categoria']);
            return response()->json($productos_bajo_stock);
        }
        
    }
}
