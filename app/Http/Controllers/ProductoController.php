<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use App\Exports\ProductoExportExcel;
use Maatwebsite\Excel\Facades\Excel;

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
        $producto->imagen_prod = '';

    
        // Resto de tus atributos
    
        if ($request->hasFile('imagen_prod')) {
            $file = $request->file('imagen_prod');
            $destinationPath = 'imagenes/imagenprod/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen_prod')->move($destinationPath, $filename);
    
            // Guarda la ruta relativa en la base de datos (sin la carpeta public)
            $producto->imagen_prod = $destinationPath . $filename;
        }
    
        $producto->categoria_id = $request->get('categoria_id');
    
        $producto->save();
    
        return redirect()->route("producto.index")->with("status", "Producto creado satisfactoriamente");
    }
    
    
    

    /**
     * Display the specified resource.
     */

     public function show($id)
     {
         $producto = Producto::findOrFail($id);
         $categoria = CategoriaProducto::find($producto->categoria_id);
     
         // HtmlString sirve para evitar que se escapen las etiquetas HTML
         $descripcion = new HtmlString(strip_tags($producto->descripcion_prod));
     
         return view('panel.Producto.lista_productos.show', compact('producto', 'categoria', 'descripcion'));
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
        $producto->precio_uni_prod = $request->get('precio_uni_prod');
        $producto->stock_min_prod = $request->get('stock_min_prod');
        $producto->stock_actual_prod = $request->get('stock_actual_prod');
        $producto->stock_max_prod = $request->get('stock_max_prod');
        $producto->categoria_id = $request->get('categoria_id');
    
        // Verificar si la descripción se envió en el formulario 
        if ($request->has('descripcion_prod') && !empty($request->get('descripcion_prod'))) {
            $producto->descripcion_prod = $request->get('descripcion_prod');
        }
    
        if ($request->hasFile('imagen_prod')) {
            $file = $request->file('imagen_prod');
            $destinationPath = 'imagenes/imagenprod/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen_prod')->move($destinationPath, $filename);
    
            $producto->imagen_prod = $destinationPath . $filename;
        }
    
        $producto->update();
    
        return redirect()->route("producto.index")->with("status", "Producto actualizado satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
    
        // Supuestamente elimina la imagen si existe
        if (Storage::disk('public')->exists($producto->imagen_prod)) {
            Storage::disk('public')->delete($producto->imagen_prod);
        }
    
        $producto->delete();
    
        return redirect()->route('producto.index')->with('status3', 'Producto eliminado satisfactoriamente!');
    }
         // EXCEL
         public function exportarProductosExcel() {

            return Excel::download(new ProductoExportExcel, 'productos.xlsx');
        }
}
