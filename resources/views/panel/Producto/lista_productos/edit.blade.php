@extends('adminlte::page')

@section('title', 'Editar Producto: ' . $productos->nombre_prod)
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@section('content')
<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-8">
            <h3 class="text-center bg-primary text-dark">Editar Producto: {{ $productos->nombre_prod }}</h3>
            <form action="{{ route('producto.update', $productos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Primera Columna -->
                    <div class="col-md-4">
                        <label for="nombre_prod" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre_prod" value="{{ old('nombre_prod', $productos->nombre_prod) }}">
                        <label for="codigo_prod" class="form-label">Código:</label>
                        <input type="text" class="form-control" name="codigo_prod" value="{{ old('codigo_prod', $productos->codigo_prod) }}">
                        <label for="precio_uni_prod" class="form-label">Precio por unidad:</label>
                        <input type="text" class="form-control" name="precio_uni_prod" value="{{ old('precio_uni_prod', $productos->precio_uni_prod) }}">
                        
                    </div>

                    <!-- Segunda Columna -->
                    <div class="col-md-4">
                        <label for="stock_min_prod" class="form-label">Stock mínimo:</label>
                        <input type="number" class="form-control" name="stock_min_prod"
                            value="{{ old('stock_min_prod', $productos->stock_min_prod) }}">
                        <label for="stock_actual_prod" class="form-label">Stock actual:</label>
                        <input type="text" class="form-control" name="stock_actual_prod"
                            value="{{ old('stock_actual_prod', $productos->stock_actual_prod) }}">
                        <label for="stock_max_prod" class="form-label">Stock máximo:</label>
                        <input type="text" class="form-control" name="stock_max_prod"
                            value="{{ old('stock_max_prod', $productos->stock_max_prod) }}">
                    </div>

                    <!-- Tercera Columna -->
                    <div class="col-md-4">
                        <label for="imagen_prod" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" name="imagen_prod">
                        @if ($productos->imagen_prod)
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="{{ asset($productos->imagen_prod) }}" class="border border-secondary"
                                alt="Imagen del producto" style="max-width: 100%; max-height: 150px;">
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="categoria_id" class="form-label">Categoría:</label> <br>
                        <select name="categoria_id" class="form-select" style="width: 100%;"> <!-- Modifica el ancho aquí -->
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    @if($categoria->id == old('categoria_id', $productos->categoria_id)) selected @endif>
                                    {{ $categoria->nombre_cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-12">
                <label for="descripcion_prod" class="form-label">Descripción:</label>
                    <!-- Agrega un div con un ID para inicializar Quill -->
                    <div id="editor" value="{{!! old('descripcion_prod', $productos->descripcion_prod) !!}}"></div>
                    <!-- Agrega un campo oculto para almacenar la descripción en formato HTML -->
                    <textarea name="descripcion_prod" id="descripcion_prod" style="display: none;"></textarea>
                </div>
                </div>
                <br><br><br>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-warning">Actualizar Producto</button>
                        <a class="btn btn-danger" href="{{ route('producto.index') }}" role="button">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Cargar la descripción almacenada en Quill
    quill.clipboard.dangerouslyPasteHTML(0, '{!! $productos->descripcion_prod !!}');

    quill.on('text-change', function () {
        var descripcionContent = quill.root.innerHTML;
        document.getElementById('descripcion_prod').value = descripcionContent;
    });
</script>

@endsection