@extends('adminlte::page')

@section('title', 'Vista del Cliente')

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
                <h3 class="text-center">Vista de Cliente {{$clientes->nombre_cli}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="cuit_cli" class="form-label mb-1">CUIT: </label>
                            <input type="text" class="form-control mb-1" name="cuit" value="{{old('cuit_cli', $clientes->cuit_cli)}}" disabled>

                            <label for="nombre_cli" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre" value="{{old('nombre_cli', $clientes->nombre_cli)}}" disabled>

                            <label for="celular_cli" class="form-label mb-1">Celular: </label>
                            <input type="text" class="form-control mb-1" name="celular" value="{{old('celular_cli', $clientes->celular_cli)}}" disabled>

                            <label for="created" class="form-label mb-1">Fecha Creación: </label>
                            <input type="text" class="form-control mb-1" name="created" value="{{old('created', $clientes->created_at)}}" disabled>

                            <label for="updated" class="form-label mb-1">Fecha de Actualización: </label>
                            <input type="text" class="form-control mb-1" name="updated" value="{{old('updated', $clientes->updated_at)}}" disabled>

                            <a class="btn btn-warning btn-sm mt-3" href="{{route('cliente.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection