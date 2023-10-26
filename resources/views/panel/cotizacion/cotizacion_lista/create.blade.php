@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Crear una nueva Cotizacion</h1>
            <a href="{{ route('cotizacion.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>

        <div class="col-12">
            

            <div class="container border p-5 mt-5">
                <form action="{{route('cotizacion.store')}}" method="POST" novalidate>
                    @csrf
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre_cotizacion" aria-describedby="emailHelp" value="{{ old('nombre_cotizacion') }}">
                    @error('nombre_cotizacion')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    </div>
            
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Valor</label>
                      <input type="number" class="form-control" name="valor_cotizacion" aria-describedby="emailHelp" value="{{ old('valor_cotizacion') }}">
                      @error('valor_cotizacion')
                      <p class="text-danger"> {{ $message }} </p>
                      @enderror
                    </div>
            
            
                      
                    <button type="submit" class="btn btn-success mb-1">Guardar Cotizacion</button>
                    <a class="btn btn-danger" href="{{ route('cotizacion.index') }}" role="button">Cancelar</a>
            
                  </form>
            </div>



        </div>

    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop