<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Validation\Rules\Can;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
        $empleados = Empleado::all();
        $usuarios = User::all();
        $user = Auth::user();

        return view('panel.caja.lista_caja.create', compact('empleados', 'user'));

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
        $caja->empleado_id = $request->get('empleado_id');

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
        $empleados = Empleado::all();
        return view('panel.caja.lista_caja.edit', compact('caja', 'empleados'));


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
}
