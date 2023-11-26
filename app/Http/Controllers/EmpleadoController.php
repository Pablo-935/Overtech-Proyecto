<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoValidacion;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('panel.Empleado.lista_empleado.index', compact('empleados'));
    }

    public function all(Request $request)
    {
        if( $request->ajax() ) {
            $empleados = Empleado::all();
            return response()->json($empleados);
        }

        return view('panel.Empleado.lista_empleado.all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $usuarios = User::all();
        return view('panel.Empleado.lista_empleado.create', compact('usuarios'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoValidacion $request)
    {
    
        $empleado = new Empleado();

        $empleado->dni_empl = $request->get('dni_empl');
        $empleado->nombre_empl = $request->get('nombre_empl');
        $empleado->apellido_empl = $request->get('apellido_empl');
        $empleado->celular_empl = $request->get('celular_empl');
        $empleado->correo_empl = $request->get('correo_empl');
        $empleado->domicilio_empl = $request->get('domicilio_empl');
        $empleado->tipo_empl = $request->get('tipo_empl');
        $empleado->user_id = $request->get('usuario_empl');
        $empleado->fecha_alta_empl = $request->get('fecha_alta_empl');
        $empleado->save();
        
        return redirect()->route("empleado.index")->with("status","Categoria creada satisfactoriamente");
    }

    /**
     * Display the specified resource
     */
    public function show($id)
    {   
        $empleado = Empleado::findOrFail($id);
        $usuarios = User::all();
        return view('panel.Empleado.lista_empleado.show', compact('empleado', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $usuarios = User::all();
        return view('panel.Empleado.lista_empleado.edit', compact('empleado', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoValidacion $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->dni_empl = $request->get('dni_empl');
        $empleado->nombre_empl = $request->get('nombre_empl');
        $empleado->apellido_empl = $request->get('apellido_empl');
        $empleado->celular_empl = $request->get('celular_empl');
        $empleado->correo_empl = $request->get('correo_empl');
        $empleado->domicilio_empl = $request->get('domicilio_empl');
        $empleado->tipo_empl = $request->get('tipo_empl');
        $empleado->user_id = $request->get('usuario_empl');
        $empleado->fecha_alta_empl = $request->get('fecha_alta_empl');

    
        $empleado->update();
        
        return redirect()->route("empleado.index")->with("status","Categoria creada satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleado.index')->with('status3', 'Categoría eliminado satisfactoriamente!');
    }
}
