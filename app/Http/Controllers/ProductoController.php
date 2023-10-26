<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view("panel.Producto.lista_productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaProducto::all();
        return view("panel.Producto.lista_productos.create", compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $producto = new Producto;

        $producto->codigo_prod = $request->get('codigo_prod');
        $producto->nombre_prod = $request->get('nombre_prod');
        $producto->descripcion_prod = $request->get('descripcion_prod');
        $producto->precio_uni_prod = $request->get('precio_uni_prod');
        $producto->stock_min_prod = $request->get('stock_min_prod');
        $producto->stock_actual_prod = $request->get('stock_actual_prod');
        $producto->stock_max_prod = $request->get('stock_max_prod');
        if ($request->hasFile('imagen_prod')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('imagen_prod')->store('public/producto');
            $producto->imagen_prod = asset(str_replace('public'
            ,
            'storage'
            , $image_url));
            } else {
            $producto->imagen_prod = '';
            }
        $producto->categoria_id = $request->get('categoria_id');

        $producto->save();
        
        return redirect()->route("producto.index")->with("status","Producto creado satisfactoriamente");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productos = Producto::findOrFail($id);
        $categoria = CategoriaProducto::find($productos->categoria_id); // Obtener la categoría del producto
        return view('panel.Producto.lista_productos.show', ['productos' => $productos, 'categoria' => $categoria]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        $categorias = CategoriaProducto::all(); // Obtén las categorías aquí
        return view('panel.Producto.lista_productos.edit', compact('productos', 'categorias'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->codigo_prod = $request->get('codigo_prod');
        $producto->nombre_prod = $request->get('nombre_prod');
        $producto->descripcion_prod = $request->get('descripcion_prod');
        $producto->precio_uni_prod = $request->get('precio_uni_prod');
        $producto->stock_min_prod = $request->get('stock_min_prod');
        $producto->stock_actual_prod = $request->get('stock_actual_prod');
        $producto->stock_max_prod = $request->get('stock_max_prod');
        if ($request->hasFile('imagen_prod')) {
            // Subida de la imagen nueva al servidor
            $image_url = $request->file('imagen_prod')->store('public/producto');
            $producto->imagen_prod = asset(str_replace('public'
            ,
            'storage'
            , $image_url));
            }
        $producto->categoria_id = $request->get('categoria_id');

        $producto->update();

        return redirect()->route("producto.index")->with("status","Producto Actualizado satisfactoriamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('producto.index')->with('status3', 'Producto eliminado satisfactoriamente!');
    }
}
