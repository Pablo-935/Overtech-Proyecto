@extends('adminlte::page')

@section('title', 'Vista del Producto Nº . $categorias->id')

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
                <h3 class="text-center">Vista de Categoría Nº{{$categorias->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="nombre" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre" value="{{old('nombre', $categorias->nombre_cat)}}" disabled>

                            <label for="descripcion" class="form-label mb-1">Descripción: </label> <br>
                            <textarea name="descripcion" class="form-control mb-1" cols="30" rows="10" disabled>{{old('descripcion', $categorias->descripcion_cat)}} </textarea>

                            <label for="created" class="form-label mb-1">Fecha Creación: </label>
                            <input type="text" class="form-control mb-1" name="created" value="{{old('created', $categorias->created_at)}}" disabled>

                            <label for="updated" class="form-label mb-1">Fecha de Actualización: </label>
                            <input type="text" class="form-control mb-1" name="updated" value="{{old('updated', $categorias->updated_at)}}" disabled>

                            <a class="btn btn-warning btn-sm mt-3" href="{{route('categoria.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection