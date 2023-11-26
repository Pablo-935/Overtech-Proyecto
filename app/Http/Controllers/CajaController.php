<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Validation\Rules\Can;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CajaValidacion;


class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caja = Caja::orderBy('id', 'desc')->get();
        return view('panel.caja.lista_caja.index', compact('caja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $user = Auth::user();

        return view('panel.caja.lista_caja.create', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CajaValidacion $request)
    {
        $ultimoRegistro = Caja::latest()->first();

        $nuevoNumeroCaja = $ultimoRegistro ? $ultimoRegistro->numero_caja + 1 : 1;


        if ($ultimoRegistro && $ultimoRegistro->abierta_caja == 'Si') {
            return redirect()->route('caja.create')->with('alert3', 'No puede Abrir 2 veces caja, cierre la caja actual para abrir una nueva');
        }
    
        $caja = new Caja();
        $caja->numero_caja = $nuevoNumeroCaja;
        $caja->saldo_inicial_caja = $request->get('saldo_inicial_caja');
        $caja->fecha_hs_aper_caja = $request->get('fecha_hs_aper_caja');
        $caja->hs_aper_caja = $request->get('hs_aper_caja');
        $caja->total_ingresos_caja = $request->get('total_ingresos_caja');
        $caja->abierta_caja = "Si";
        $caja->total_egresos_caja = $request->input('total_egresos_caja');
        $caja->total_saldo_caja = $request->get('total_saldo_caja');
        $caja->user_id = $request->get('usuario_id');
        // $caja->user_cier_id = null ;


        $caja->save();
    
        return redirect()->route('caja.index')->with('status', 'Nueva Caja abierta');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $caja = Caja::findOrFail($id);
        $usuarios = User::all();
        $user = Auth::user();
        return view('panel.caja.lista_caja.show', compact('caja', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $caja = Caja::findOrFail($id);
        $usuarios = User::all();
        $user = Auth::user();
        return view('panel.caja.lista_caja.edit', compact('caja', 'user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $caja = Caja::findOrFail($id);
        $caja->abierta_caja = 'No';
        $caja->fecha_hs_cier_caja = now()->toDateString();
        $caja->hs_cier_caja = $request-> input('hs_cier_caja');
        $caja ->save();
        return redirect()->route('caja.index')->with('alert3', 'Caja cerrada exitosamente');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caja $caja)
    {
        //
    }
    public function graficoIngresosEgresos(Request $request)
    {
        if($request->ajax()) {
            $labels = [];
            $ingresos = [];
            $egresos = [];
            
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
    
            $movimientos = DB::table('cajas')
                ->select(
                    DB::raw('DATE(fecha_hs_aper_caja) as fecha'),
                    DB::raw('SUM(total_ingresos_caja) as total_ingresos'),
                    DB::raw('SUM(total_egresos_caja) as total_egresos')
                )
                ->whereBetween('fecha_hs_aper_caja', [$fechaInicio, $fechaFin])
                ->groupBy(DB::raw('DATE(fecha_hs_aper_caja)'))
                ->orderBy(DB::raw('DATE(fecha_hs_aper_caja)'))
                ->get();
    
            foreach($movimientos as $movimiento) {
                $labels[] = $movimiento->fecha;
                $ingresos[] = $movimiento->total_ingresos;
                $egresos[] = $movimiento->total_egresos;
            }
    
            $response = [
                'success' => true,
                'data' => [$labels, $ingresos, $egresos]
            ];
    
            return json_encode($response);
        }
    
        return view('panel.caja.lista_caja.grafico_ingegre');
    }
    
}