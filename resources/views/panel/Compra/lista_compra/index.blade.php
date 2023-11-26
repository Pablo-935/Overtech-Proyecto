@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Compras')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Compras</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    @if (session('alert'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('alert')}}
                <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('compra.create') }}" class="btn btn-success text-uppercase">
                Nueva Compra
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

        @if (session('alert3'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('alert3') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Nº Compra</th>
                            <th scope="col" class="text-uppercase">Fecha</th>
                            <th scope="col" class="text-uppercase">Hora</th>
                            <th scope="col" class="text-uppercase">Operador</th>
                            <th scope="col" class="text-uppercase">Detalle</th>
                            <th scope="col" class="text-uppercase">Monto</th>
                            <th scope="col" class="text-uppercase">Numero de Caja</th>
                            <th scope="col" class="text-uppercase">proveedor</th>
                            <th scope="col" class="text-uppercase">Nº Requerimiento</th>
                            <th scope="col" class="text-uppercase">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->num_comp }}</td>
                            <td>{{ $compra->fecha_comp}}</td>
                            <td>{{ $compra->hora_comp }}</td>
                            <td>{{ $compra->operador}}</td>
                            <td>{{ $compra->detalle }}</td>
                            <td>{{number_format( $compra->monto_comp )}}</td>
                            <td>{{ $compra->caja->numero_caja }}</td>
                            <td>{{ $compra->proveedor->nombre_prov }}</td>
                            <td>{{ $compra->RequerimientoCompra->id }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('compra.show', $compra->id) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    {{-- <a href="{{ route('compra.edit', $compra->id) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('compra.destroy', $compra->id) }}" method="POST" class="formulario-eliminar">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                            Eliminar
                                        </button>
                                    </form> --}}
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
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{asset('js/table.js')}}"></script>
@stop