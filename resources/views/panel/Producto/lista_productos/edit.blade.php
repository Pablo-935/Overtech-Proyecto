@extends('adminlte::page')

@section('title', 'Editar Producto: ' . $productos->nombre_prod)

@section('content')
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h3 class="text-center">Editar Producto: {{ $productos->nombre_prod }}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('producto.update', $productos->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="codigo_prod" class="form-label">Código:</label>
                                    <input type="text" class="form-control" name="codigo_prod" value="{{ old('codigo_prod', $productos->codigo_prod) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_prod" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_prod" value="{{ old('nombre_prod', $productos->nombre_prod) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="descripcion_prod" class="form-label">Descripción:</label>
                                    <input type="text" class="form-control" name="descripcion_prod" value="{{ old('descripcion_prod', $productos->descripcion_prod) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="precio_uni_prod" class="form-label">Precio por unidad:</label>
                                    <input type="text" class="form-control" name="precio_uni_prod" value="{{ old('precio_uni_prod', $productos->precio_uni_prod) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stock_min_prod" class="form-label">Stock mínimo:</label>
                                    <input type="number" class="form-control" name="stock_min_prod" value="{{ old('stock_min_prod', $productos->stock_min_prod) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="stock_actual_prod" class="form-label">Stock actual:</label>
                                    <input type="text" class="form-control" name="stock_actual_prod" value="{{ old('stock_actual_prod', $productos->stock_actual_prod) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stock_max_prod" class="form-label">Stock máximo:</label>
                                    <input type="text" class="form-control" name="stock_max_prod" value="{{ old('stock_max_prod', $productos->stock_max_prod) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="categoria_id" class="form-label">Categoría:</label> <br>
                                <select name="categoria_id" class="form-select">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @if($categoria->id == old('categoria_id', $productos->categoria_id)) selected @endif>{{ $categoria->nombre_cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="imagen_prod" class="form-label">Imagen:</label>
                                    <input type="file" class="form-control" name="imagen_prod">
                                </div>
                            </div>

                            @if ($productos->imagen_prod)
                                <img src="{{ asset($productos->imagen_prod) }}" class="border border-secondary" alt="Imagen del producto" style="max-width: 100%; max-height: 400px;">
                            @endif



                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-warning">Actualizar Producto</button>
                                <a class="btn btn-danger" href="{{ route('producto.index') }}" role="button">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
