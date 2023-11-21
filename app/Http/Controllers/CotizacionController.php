<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use App\Http\Requests\CotizacionesValidacion;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotizacion = Cotizacion::all();
        return view('panel.cotizacion.cotizacion_lista.index', compact('cotizacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cotizacion = new Cotizacion();

        return view('panel.cotizacion.cotizacion_lista.create', compact('cotizacion'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = $request->validate([
            'nombre_cotizacion' => 'required|string|max:20',
            'valor_cotizacion' => 'required|numeric|gt:0',


        ]);

        cotizacion::create($validar);

        return redirect()->route('cotizacion.index')->with('alert', 'Nueva cotizacion creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);

        return view('panel.cotizacion.cotizacion_lista.edit', ['cotizacion' => $cotizacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CotizacionesValidacion $request,  $id)
    {
        $validar = $request->validate([
            'nombre_cotizacion' => 'required|string|max:20',
            'valor_cotizacion' => 'required|numeric|gt:0',


        ]);
        //busqueda del producto
        $cotizacion = cotizacion::findOrFail($id);

        //actualizar
        $cotizacion->update($validar);

        return redirect()->route('cotizacion.index')->with('status2', 'Cotizacion actualizada satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
                        //busqueda del producto
                        $cotizacion = cotizacion::findOrFail($id);


                        //Eliminacion del producto
                        $cotizacion->delete();
                
                        //Redireccion con un mensaje flash de sesion
                        return redirect()->route('cotizacion.index')->with('alert3', 'Cotizacion Eliminada');
    }
}
