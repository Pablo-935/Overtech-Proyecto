@extends('adminlte::page')

@section('title','Editar Cliente ' . $clientes->nombre_cli)

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
                <h3 class="text-center">Editar Cliente Nº{{$clientes->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('cliente.update', $clientes->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="cuit" class="form-label mb-1">Cuit: </label>
                            <input type="text" class="form-control mb-1 @error('cuit_cli') is-invalid @enderror" name="cuit_cli" value="{{old('cuit_cli', $clientes->cuit_cli)}}">
                                    @error('cuit_cli')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                            <label for="nombre" class="form-label mb-1">Nombre: </label> <br>
                            <input type="text" class="form-control mb-1 @error('nombre_cli') is-invalid @enderror" name="nombre_cli" value="{{old('nombre_cli', $clientes->nombre_cli)}}">
                                    @error('nombre_cli')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                            <label for="celular" class="form-label mb-1">Celular: </label> <br>
                            <input type="text" class="form-control mb-1 @error('celular_cli') is-invalid @enderror" name="celular_cli" value="{{old('celular_cli', $clientes->celular_cli)}}">
                                    @error('celular_cli')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                            <button type="submit" class="btn btn-success btn-sm mt-3">Actualizar Cliente</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('cliente.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection