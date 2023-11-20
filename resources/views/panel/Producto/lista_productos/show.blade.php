@extends('adminlte::page')

@section('title', 'Vista del producto Nº ' . $producto->id)

@section('content')
<style>
    .zoomable-image-container {
        overflow: hidden;
        position: relative;
        margin: 0;
    }

    .zoomable-image {
        transition: transform 0.2s ease-out;
        transform-origin: 0 0;
    }

    .card {
        height: 91%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Vista de Producto: {{ $producto->codigo_prod }}</h2>
        </div>
        <div class="col-md-6">
            <div class="card">
            <div class="zoomable-image-container" id="zoomContainer">
                <img src="{{ asset($producto->imagen_prod) }}" class="zoomable-image img-fluid" alt="Imagen del producto" disabled>
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>{{ $categoria->nombre_cat }} - <b>{{ old('nombre_prod', $producto->nombre_prod) }}</b> </h6>
                    <ul class="list-group list-group-flush">
                        <h1><b>{{ old('nombre_prod', $producto->nombre_prod) }}</b></h1>
                        <h2><b>${{ old('precio_uni_prod', $producto->precio_uni_prod) }}<b></h2>
                        <li class="list-group-item"><h5>Descripción del producto:<br><br>
                            <div>{!! $producto->descripcion_prod !!}</div>
                            </h5>
                        <li class="list-group-item"><h5>Stock mínimo: {{ old('stock_min_prod', $producto->stock_min_prod) }}</h5></li>
                        <li class="list-group-item"><h5>Stock actual: {{ old('stock_actual_prod', $producto->stock_actual_prod) }}</h5></li>
                        <li class="list-group-item"><h5>Stock máximo: {{ old('stock_max_prod', $producto->stock_max_prod) }}</h5></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-warning btn-lg" href="{{ route('producto.index') }}" role="button">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
    var zoomContainer = document.getElementById('zoomContainer');
    var image = zoomContainer.querySelector('.zoomable-image');
    var originalTransform = window.getComputedStyle(image).getPropertyValue('transform');

    zoomContainer.addEventListener('mousemove', function (event) {
        var boundingBox = zoomContainer.getBoundingClientRect();
        var mouseX = event.clientX - boundingBox.left;
        var mouseY = event.clientY - boundingBox.top;

        var percentX = (mouseX / boundingBox.width) * 100;
        var percentY = (mouseY / boundingBox.height) * 100;

        var transformValue = 'scale(1.5) translate(-' + percentX + '%, -' + percentY + '%)';
        image.style.transform = transformValue;
    });

    zoomContainer.addEventListener('mouseleave', function () {
        image.style.transform = originalTransform;
    });
</script>
@endsection
