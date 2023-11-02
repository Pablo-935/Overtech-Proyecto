@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Clientes')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('cliente.create') }}" class="btn btn-success text-uppercase">
                Nuevo Cliente
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
                            <th scope="col" class="text-uppercase text-center">CUIT</th>
                            <th scope="col" class="text-uppercase text-center">Nombre</th>
                            <th scope="col" class="text-uppercase text-center">Celular</th>
                            <th scope="col" class="text-uppercase text-center">Fecha Creación</th>
                            <th scope="col" class="text-uppercase text-center">Fecha Actualización</th>
                            <th scope="col" class="text-uppercase text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr class="text-center">
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cuit_cli }}</td>
                            <td>{{ $cliente->nombre_cli }}</td>
                            <td>{{ $cliente->celular_cli }}</td>
                            <td>{{ $cliente->created_at }}</td>
                            <td>{{ $cliente->updated_at }}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-sm btn-warning text-white text-uppercase mx-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" class="formulario-eliminar">
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