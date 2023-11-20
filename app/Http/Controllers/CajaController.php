<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Validation\Rules\Can;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
    public function store(Request $request)
    {
        $ultimoRegistro = Caja::latest()->first();

        if ($ultimoRegistro && $ultimoRegistro->abierta_caja == 'Si') {
            return redirect()->route('caja.create')->with('alert3', 'No puede Abrir 2 veces caja, cierre la caja actual para abrir una nueva');
        }
    
        $caja = new Caja();
        $caja->numero_caja = $request->get('numero_caja');
        $caja->saldo_inicial_caja = $request->get('saldo_inicial_caja');
        $caja->fecha_hs_aper_caja = $request->get('fecha_hs_aper_caja');
        $caja->total_ingresos_caja = $request->get('total_ingresos_caja');
        $caja->abierta_caja = "Si";
        $caja->total_egresos_caja = $request->input('total_egresos_caja');
        $caja->total_saldo_caja = $request->get('total_saldo_caja');
        $caja->user_id = $request->get('usuario_id');

        $caja->save();
    
        return redirect()->route('caja.index')->with('status', 'Nueva Caja abierta');

    }

    /**
     * Display the specified resource.
     */
    public function show(Caja $caja)
    {
        //
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
    private function obtenerIngresosPorFecha()
    {
        return Caja::select(DB::raw('DATE(created_at) as fecha'), DB::raw('SUM(total_ingresos_caja) as total'))
            ->whereBetween('created_at', ['2023-01-01', '2023-12-31'])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'fecha')
            ->toArray();
    }

    private function obtenerEgresosPorFecha()
    {
        return Caja::select(DB::raw('DATE(created_at) as fecha'), DB::raw('SUM(total_egresos_caja) as total'))
            ->whereBetween('created_at', ['1971-01-14', '2023-12-31'])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'fecha')
            ->toArray();
    }

    public function obtenerTotalesIngresosEgresos()
    {
        $totales = Caja::select(
            DB::raw('SUM(total_ingresos_caja) as total_ingresos'),
            DB::raw('SUM(total_egresos_caja) as total_egresos')
        )
        ->first();
    
        return $totales;
    }
    
    public function graficoIngresosEgresos()
    {
        $totales = $this->obtenerTotalesIngresosEgresos();
    
        // Preparar los datos para la vista
        $data = [
            'labels' => ['Ingresos', 'Egresos'], // Etiquetas para el gráfico
            'datasets' => [
                [
                    'label' => 'Ingresos',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => [$totales->total_ingresos ?? 0],
                ],
                [
                    'label' => 'Egresos',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => [$totales->total_egresos ?? 0],
                ],
            ], // Valores correspondientes a las etiquetas
        ];
        
        return view('panel.caja.lista_caja.grafico_ingegre', compact('data'));
        
}
}