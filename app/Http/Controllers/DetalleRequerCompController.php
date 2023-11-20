<?php

namespace App\Http\Controllers;

use App\Models\DetalleRequerComp;
use Illuminate\Http\Request;

class DetalleRequerCompController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleRequerComp $detalleRequerComp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleRequerComp $detalleRequerComp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleRequerComp $detalleRequerComp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        logger('hola');
        $detalleRequerimiento = DetalleRequerComp::findOrFail($id);
        $detalleRequerimiento->delete();
        
    }

    // public function destroyDetalle($id)
    // {   
    //     $detalleRequerimiento = DetalleRequerComp::find($id);

    //     if ($detalleRequerimiento) {
    //         $detalleRequerimiento->delete();
    //         $response = array(
    //             'status' => true,
    //             'code' => 200, //204 "Resource updated successfully"- La solicitud se cumplió y el servidor actualizo el recurso.
    //             'message' => '',
    //             'data' => null
    //         );
    //         // return response()->json($response)->redirect()->route("requerimiento{$id}/edit");
    //         return response()->json($response);
    //     }

    //     return response()->json(['success' => false], 404);
    // }
}
