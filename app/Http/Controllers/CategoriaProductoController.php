<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = CategoriaProducto::all();
        return view("panel.CategoriaProducto.lista_categorias.index", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel.CategoriaProducto.lista_categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $categoria = new CategoriaProducto;

        $categoria->nombre_cat = $request->get('nombre_cat');
        $categoria->descripcion_cat = $request->get('descripcion_cat');

        $categoria->save();
        
        return redirect()->route("categoria.index")->with("status","Categoria creada satisfactoriamente");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $categorias = CategoriaProducto::findOrFail($id);
        return view('panel.CategoriaProducto.lista_categorias.show', ['categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = CategoriaProducto::findOrFail($id);
        return view('panel.CategoriaProducto.lista_categorias.edit', ['categorias'=> $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);

        $categoria->nombre_cat = $request->get('nombre_cat');
        $categoria->descripcion_cat = $request->get('descripcion_cat');

        $categoria->update();

        return redirect()->route("categoria.index")->with("status","Categoria creada satisfactoriamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('status3', 'Categoría eliminado satisfactoriamente!');
    }
}
