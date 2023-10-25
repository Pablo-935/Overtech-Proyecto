@extends('adminlte::page')

@section('title', 'Crear Nueva Categoría')

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
                <h3 class="text-center">Crear Categoría</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('categoria.store')}}" method="POST" novalidate>
                            @csrf 

                            <label for="nombre_cat" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre_cat" value="{{old('nombre_cat')}}">

                            <label for="descripcion_cat" class="form-label mb-1">Descripción: </label> <br>
                            <textarea name="descripcion_cat" class="form-control mb-1" cols="30" rows="10">{{old('descripcion_cat')}} </textarea>

                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Categoría</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('categoria.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection