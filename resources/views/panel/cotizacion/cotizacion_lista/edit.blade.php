@extends('adminlte::page')

@section('title', 'Ver Cotizacion')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="mt-5">Editar Cotizacion</h1>

        </div>

        <div class="col-12">
            

            <div class="container border p-5 mt-5">
                <form action="{{route('cotizacion.update', $cotizacion->id)}}" method="POST" novalidate>
                    @csrf @method('PUT')
            
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="hidden" class="form-control" name="nombre_cotizacion" aria-describedby="emailHelp" value="{{ old('nombre_cotizacion', $cotizacion->nombre_cotizacion) }}">
                        <p>{{ old('nombre_cotizacion', $cotizacion->nombre_cotizacion) }}</p>
                      @error('nombre_cotizacion')
                      <p class="text-danger"> {{ $message }} </p>
                      @enderror
                      </div>
              
              
              
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Valor</label>
                        <input type="text" class="form-control @error('valor_cotizacion') is-invalid @enderror" name="valor_cotizacion" aria-describedby="emailHelp" value="{{ old('valor_cotizacion', $cotizacion->valor_cotizacion) }}">
                        @error('valor_cotizacion')
                        <div class="invalid-feedback"> {{ $message }} </div>
                      @enderror

                      </div>
              
            
            
                      
                    <button type="submit" class="btn btn-success mt-1 mb-1">Guardar Cotizacion</button>
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