<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\RequerimientoCompra;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caja;
use Illuminate\Support\Facades\Auth;
use App\Models\Proveedor;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
