<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteValidacion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = cliente::all();
        return view("panel.cliente.lista_clientes.index", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel.cliente.lista_clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteValidacion $request)
    {   
        $cliente = new Cliente;

        $cliente->cuit_cli = $request->get('cuit_cli');
        $cliente->nombre_cli = $request->get('nombre_cli');
        $cliente->celular_cli = $request->get('celular_cli');

        $cliente->save();
        
        return redirect()->route("cliente.index")->with("status","Cliente creado satisfactoriamente");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $clientes = Cliente::findOrFail($id);
        return view('panel.cliente.lista_clientes.show', ['clientes' => $clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('panel.cliente.lista_clientes.edit', ['clientes'=> $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteValidacion $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->cuit_cli = $request->get('cuit_cli');
        $cliente->nombre_cli = $request->get('nombre_cli');
        $cliente->celular_cli = $request->get('celular_cli');

        $cliente->update();

        return redirect()->route("cliente.index")->with("status","Cliente creado satisfactoriamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('status3', 'Cliente eliminado satisfactoriamente!');
    }
}
