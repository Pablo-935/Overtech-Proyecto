@extends('adminlte::page')

@section('title', '$categorias->id')

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
                <h3 class="text-center">Editar Categoría Nº{{$categorias->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('categoria.update', $categorias->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="nombre" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre_cat" value="{{old('nombre_cat', $categorias->nombre_cat)}}">

                            <label for="descripcion" class="form-label mb-1">Descripción: </label> <br>
                            <textarea name="descripcion_cat" class="form-control mb-1" cols="30" rows="10">{{old('descripcion_cat', $categorias->descripcion_cat)}} </textarea>

                            <button type="submit" class="btn btn-success btn-sm mt-3">Editar Categoría</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('categoria.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection