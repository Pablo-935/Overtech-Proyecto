<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor = Proveedor::all();
        return view('panel.proveedor.proveedor_lista.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.proveedor.proveedor_lista.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = $request->validate([
            'nombre_prov' => 'required|string|max:20',
            'telefono_prov' => 'required|numeric|min_digits:10|max_digits:10',
            'direccion_prov' => 'required|string',
            'ubicacion_prov' => 'required|string',
            'correo_prov' => 'required|string|email',

        ]);
        Proveedor::create($request->all());

        return redirect()->route('proveedor.index')->with('status', 'Proveedor creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::FindOrFail($id);
        return view('panel.proveedor.proveedor_lista.show', ['proveedor' => $proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('panel.proveedor.proveedor_lista.edit', ['proveedor' => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validar = $request->validate([
            'nombre_prov' => 'required|string|max:20',
            'telefono_prov' => 'required|numeric|min_digits:10|max_digits:10',
            'direccion_prov' => 'required|string',
            'ubicacion_prov' => 'required|string',
            'correo_prov' => 'required|string|email',

        ]);
        //busqueda del producto
        $proveedor = Proveedor::findOrFail($id);

        //actualizar
        $proveedor->update($validar);

        return redirect()->route('proveedor.index')->with('status2', 'Proveedor actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $proveedor = Proveedor::findOrFail($id);

        $proveedor->delete();
        
        return redirect()->route('proveedor.index')->with('alert3', 'Proveedor Eliminado');
    }
}
