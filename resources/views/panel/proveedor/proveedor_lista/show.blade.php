@extends('adminlte::page')

@section('title', 'Ver Proveedor')

@section('content_header')
    
@stop

@section('content')

<div class="container p-5 mt-5">

    <div class="card">
        <h5 class="card-header">DETALLE DE PROVEEDOR</h5>
        <div class="card-body">
          <h5 class="card-title"> <b>Nombre</b>: {{ $proveedor->nombre_prov }}</h5> <br><br>
          <p class="card-text"><b>Telefono</b>: {{ $proveedor->telefono_prov }}</p>
          <p class="card-text"><b>Direccion</b>: {{ $proveedor->direccion_prov }}</p>
          <p class="card-text"><b>Ubicacion</b>: {{ $proveedor->ubicacion_prov }}</p>
          <p class="card-text"><b>Correo</b>: {{ $proveedor->correo_prov }}</p>


          <a class="btn btn-warning" href="{{ route('proveedor.index') }}" role="button">VOLVER</a>
        </div>
      </div>


    
</div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop




