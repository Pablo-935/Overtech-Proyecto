@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Editar Proveedor</h1>
            <a href="{{ route('proveedor.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>


        <div class="container  border p-5 mt-5">
            <form action="{{route('proveedor.update', $proveedor->id)}}" method="POST" novalidate>
                @csrf @method('PUT')
        
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre_prov" aria-describedby="emailHelp" value="{{ old('nombre_prov', $proveedor->nombre_prov) }}">
                @error('nombre_prov')
                <p class="text-danger"> {{ $message }} </p>
                @enderror
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Telefono</label>
                  <input type="text" class="form-control" name="telefono_prov" aria-describedby="emailHelp" value="{{ old('telefono_prov', $proveedor->telefono_prov) }}">
                  @error('telefono_prov')
                  <p class="text-danger"> {{ $message }} </p>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion_prov" aria-describedby="emailHelp" value="{{ old('direccion_prov', $proveedor->direccion_prov) }}">
                  @error('direccion_prov')
                  <p class="text-danger"> {{ $message }} </p>
                  @enderror
                </div>
          
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Ubicacion</label>
                  <input type="text" class="form-control" name="ubicacion_prov" aria-describedby="emailHelp" value="{{ old('ubicacion_prov', $proveedor->ubicacion_prov) }}">
                  @error('ubicacion_prov')
                  <p class="text-danger"> {{ $message }} </p>
                  @enderror
                </div>
          
                <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Correo</label>
                      <input type="text" class="form-control" name="correo_prov" aria-describedby="emailHelp" value="{{ old('correo_prov', $proveedor->correo_prov) }}">
                      @error('correo_prov')
                      <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-success mt-2 mb-2">Actualizar Producto</button>
                <a class="btn btn-danger" href="{{ route('proveedor.index') }}" role="button">Cancelar</a>
        
              </form>
        </div>

    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop