@extends('adminlte::page')

@section('title', 'Vista del Proveedor')

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-6">
                <h3 class="text-center">Vista de Proveedor {{$proveedor->nombre_prov}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="id" class="form-label mb-1">ID: </label>
                            <input type="text" class="form-control mb-1" name="cuit" value="{{old('id', $proveedor->id)}}" disabled>

                            <label for="nombre_prov" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre" value="{{old('nombre_prov', $proveedor->nombre_prov)}}" disabled>

                            <label for="telefono_prov" class="form-label mb-1">Telefono: </label>
                            <input type="text" class="form-control mb-1" name="telefono" value="{{old('telefono_prov', $proveedor->telefono_prov)}}" disabled>

                            <label for="direccion_prov" class="form-label mb-1">Direccion: </label>
                            <input type="text" class="form-control mb-1" name="telefono" value="{{old('direccion_prov', $proveedor->direccion_prov)}}" disabled>

                            <label for="ubicacion_prov" class="form-label mb-1">Ubicación: </label>
                            <input type="text" class="form-control mb-1" name="ubicacion_prov" value="{{old('ubicacion_prov', $proveedor->ubicacion_prov)}}" disabled>

                            <label for="correo_prov" class="form-label mb-1">Correo: </label>
                            <input type="text" class="form-control mb-1" name="correo" value="{{old('correo_prov', $proveedor->correo_prov)}}" disabled>

                            <a class="btn btn-warning btn-sm mt-3" href="{{route('proveedor.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection