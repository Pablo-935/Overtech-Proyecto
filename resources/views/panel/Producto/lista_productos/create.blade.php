@extends('adminlte::page')

@section('title', 'Crear Nuevo Producto')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Crear Producto</h3>
                        <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="codigo_prod" class="form-label">Código:</label>
                                    <input type="text" class="form-control" name="codigo_prod" value="{{ old('codigo_prod') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_prod" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre_prod" value="{{ old('nombre_prod') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="descripcion_prod" class="form-label">Descripción:</label>
                                    <input type="text" class="form-control" id="" name="descripcion_prod" value="{{ old('descripcion_prod') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="precio_uni_prod" class="form-label">Precio por unidad:</label>
                                    <input type="text" class="form-control" name="precio_uni_prod" value="{{ old('precio_uni_prod') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stock_min_prod" class="form-label">Stock mínimo:</label>
                                    <input type="number" class="form-control" name="stock_min_prod" value="{{ old('stock_min_prod') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="stock_actual_prod" class="form-label">Stock actual:</label>
                                    <input type="text" class="form-control" name="stock_actual_prod" value="{{ old('stock_actual_prod') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stock_max_prod" class="form-label">Stock máximo:</label>
                                    <input type="text" class="form-control" name="stock_max_prod" value="{{ old('stock_max_prod') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_prod" class="form-label">Imagen:</label>
                                    <input type="file" class="form-control" name="imagen_prod" value="{{ old('imagen_prod') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">Categoría:</label>
                                <select name="categoria_id" class="form-control">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre_cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="editor"></div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-sm">Guardar Producto</button>
                                <a class="btn btn-warning btn-sm" href="{{ route('producto.index') }}" role="button">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var quill = new Quill('#editor', {
          theme: 'snow' // Puedes elegir otros temas según tus preferencias
        });
      </script>
      
@endsection
