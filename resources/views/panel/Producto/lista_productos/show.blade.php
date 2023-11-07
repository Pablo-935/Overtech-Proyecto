@extends('adminlte::page')

@section('title', 'Vista del producto Nº ' . $producto->id)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Vista de Producto: {{ $producto->codigo_prod }}</h2>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ asset($producto->imagen_prod) }}" class="border border-secondary" alt="Imagen del producto" style="max-width: 100%; max-height: 400px;" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <h2><b>Nombre: {{ old('nombre_prod', $producto->nombre_prod) }}</b></h2>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Descripción:</b></h5>
                                    <div>
                                        {!! $producto->descripcion_prod !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Precio por unidad: ${{ old('precio_uni_prod', $producto->precio_uni_prod) }}</b></h5>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Stock mínimo: {{ old('stock_min_prod', $producto->stock_min_prod) }}</b></h5>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Stock actual: {{ old('stock_actual_prod', $producto->stock_actual_prod) }}</b></h5>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Stock máximo: {{ old('stock_max_prod', $producto->stock_max_prod) }}</b></h5>
                                </div>

                                <div class="mb-3 row">
                                    <h5><b>Categoría: {{ $categoria->nombre_cat }}</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a class="btn btn-warning btn-sm" href="{{ route('producto.index') }}" role="button">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection