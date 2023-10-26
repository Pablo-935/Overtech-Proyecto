@extends('adminlte::page')

@section('title', '$productos->id')

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
                <h3 class="text-center">Editar Producto: {{$productos->nombre_prod}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('producto.update', $productos->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="codigo_prod" class="form-label mb-1">Codigo: </label>
                            <input type="text" class="form-control mb-1" name="codigo_prod" value="{{old('codigo_prod', $productos->codigo_prod)}}">

                            <label for="nombre_prod" class="form-label mb-1">Nombre: </label> <br>
                            <input type="text" class="form-control mb-1" name="nombre_prod" value="{{old('nombre_prod', $productos->nombre_prod)}}">

                            <label for="descripcion_prod" class="form-label mb-1">Descripción: </label> <br>
                            <input type="text" class="form-control mb-1" name="descripcion_prod" value="{{old('descripcion_prod', $productos->descripcion_prod)}}">

                            <label for="precio_uni_prod" class="form-label mb-1">Precio por unidad: </label> <br>
                            <input type="text" class="form-control mb-1" name="precio_uni_prod" value="{{old('precio_uni_prod', $productos->precio_uni_prod)}}">

                            <label for="stock_min_prod" class="form-label mb-1">Stock minimo: </label> <br>
                            <input type="number" class="form-control mb-1" name="stock_min_prod" value="{{old('stock_min_prod', $productos->stock_min_prod)}}">

                            <label for="stock_actual_prod" class="form-label mb-1">Stock actual: </label> <br>
                            <input type="text" class="form-control mb-1" name="stock_actual_prod" value="{{old('stock_actual_prod', $productos->stock_actual_prod)}}">

                            <label for="stock_max_prod" class="form-label mb-1">Stock maximo: </label> <br>
                            <input type="text" class="form-control mb-1" name="stock_max_prod" value="{{old('stock_max_prod', $productos->stock_max_prod)}}">

                            <label for="imagen_prod" class="form-label mb-1">Imagen: </label>
                            <input type="text" class="form-control mb-1" name="imagen_prod" value="{{old('imagen_prod', $productos->imagen_prod)}}">
                            
                            <div class="mb-3 row">
                
                            <label for="categoria" class="col-sm-4 col-form-label"> * Categoria </label>
                                <div class="col-sm-8">
                                <select name="categoria_id" class="form-control">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @if($categoria->id == old('categoria_id', $productos->categoria_id)) selected @endif>{{ $categoria->nombre_cat }}</option>
                                    @endforeach
                                </select>

    
                                     {{--                     @error('categoria')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror --}}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm mt-3">Actualizar Producto</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('producto.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection