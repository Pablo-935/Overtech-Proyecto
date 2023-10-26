@extends('adminlte::page')

@section('title', 'Crear Nueva Cliente')

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
                <h3 class="text-center">Crear Cliente</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('cliente.store')}}" method="POST" novalidate>
                            @csrf 

                            <label for="cuit_cli" class="form-label mb-1">Cuit: </label>
                            <input type="text" class="form-control mb-1" name="cuit_cli" value="{{old('cuit_cli')}}">

                            <label for="nombre_cli" class="form-label mb-1">Nombre: </label> <br>
                            <input type="text" class="form-control mb-1" name="nombre_cli" value="{{old('nombre_cli')}}">

                            <label for="celular_cli" class="form-label mb-1">Celular: </label> <br>
                            <input type="text" class="form-control mb-1" name="celular_cli" value="{{old('celular_cli')}}">

                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Cliente</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('categoria.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection