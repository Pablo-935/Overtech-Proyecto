@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Crear un nuevo Proveedor</h1>
            <a href="{{ route('proveedor.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>

        <div class="col-12">
            

            <div class="container border p-5 mt-5">
                <form action="{{route('proveedor.store')}}" method="POST" novalidate>
                    @csrf
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre_prov" aria-describedby="emailHelp" value="{{ old('nombre_prov') }}">
                    @error('nombre_prov')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    </div>
            
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Telefono</label>
                      <input type="text" class="form-control" name="telefono_prov" aria-describedby="emailHelp" value="{{ old('telefono_prov') }}">
                      @error('telefono_prov')
                      <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    </div>
            
            
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion_prov" aria-describedby="emailHelp" value="{{ old('direccion_prov') }}">
                        @error('direccion_prov')
                        <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
            
            
            
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" name="ubicacion_prov" aria-describedby="emailHelp" value="{{ old('ubicacion_prov') }}">
                        @error('ubicacion_prov')
                        <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo_prov" aria-describedby="emailHelp" value="{{ old('correo_prov') }}">
                        @error('correo_prov')
                        <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
            
                      
                    <button type="submit" class="btn btn-success mb-2">Guardar Proveedor</button>
                    <a class="btn btn-danger" href="{{ route('proveedor.index') }}" role="button">Cancelar</a>
            
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