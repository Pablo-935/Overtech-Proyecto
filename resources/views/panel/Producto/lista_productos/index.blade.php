@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Productos')

{{-- Titulo en el contenido de la Página --}}
@section('content_header')
    <h1>Lista de Productos</h1>
@stop

{{-- Contenido de la Página --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('producto.create') }}" class="btn btn-success text-uppercase">
                Nuevo Producto
            </a>
        </div>
        
        @if (session('status'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('status3'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('status3') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tabla-productos" class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase text-center">ID</th>
                                <th scope="col" class="text-uppercase text-center">Nombre</th>
                                <th scope="col" class="text-uppercase text-center">Precio unitario</th>
                                <th scope="col" class="text-uppercase text-center">Stock actual</th>
                                <th scope="col" class="text-uppercase text-center">Imagen</th>
                                <th scope="col" class="text-uppercase text-center">Categoría</th>
                                <th scope="col" class="text-uppercase text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr class="text-center">
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre_prod }}</td>
                                <td>${{ $producto->precio_uni_prod }}</td>
                                <td>{{ $producto->stock_actual_prod }}</td>
                                <td>
                                    <img src="{{ asset($producto->imagen_prod) }}" alt="{{ $producto->nombre_prod }}" class="img-fluid border border-secondary" style="width: 130px;">
                                </td>
                                <td>
                                    @if ($producto->categoria)
                                        {{ $producto->categoria->nombre_cat }}
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                            Ver
                                        </a>
                                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-sm btn-warning text-white text-uppercase mx-1">
                                            Editar
                                        </a>
                                        <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" class="formulario-eliminar">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Importación de Archivos CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

{{-- Importación de Archivos JS --}}
@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
@stop
