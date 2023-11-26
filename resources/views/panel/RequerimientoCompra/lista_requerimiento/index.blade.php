@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Requerimientos')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Requerimientos</h1>
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

    @if (session('alert2'))
    <div class="col-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('alert2')}}
            <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    @if (session('alert3'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('alert3')}}
            <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('requerimiento.create') }}" class="btn btn-success text-uppercase">
                Nuevo Requerimiento
            </a>
        </div>
        
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">id</th>
                            <th scope="col" class="text-uppercase">fecha</th>
                            <th scope="col" class="text-uppercase">estado</th>
                            <th scope="col" class="text-uppercase">empleado</th>
                            <th scope="col" class="text-uppercase">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requerimientos as $requerimiento)
                        <tr>
                            <td>{{ $requerimiento->id }}</td>
                            <td>{{ $requerimiento->fecha_requer_comp}}</td>
                            <td>
                                @if ($requerimiento->estado_requer_comp === "Pendiente")
                                <a class="btn btn-warning"  role="button">{{$requerimiento->estado_requer_comp}}</a>

                                @endif
                                @if ($requerimiento->estado_requer_comp === "Aprobado")
                                <a class="btn btn-success"  role="button">{{$requerimiento->estado_requer_comp}}</a>
                                @endif
                                @if ($requerimiento->estado_requer_comp === "Rechazado")
                                <a class="btn btn-danger"  role="button">{{$requerimiento->estado_requer_comp}}</a>
                                @endif
                            </td>
                            <td>{{ $requerimiento->user->name }}</td>
                            <td style="width: 0%">
                                <div class="d-flex">
                                    <a href="{{ route('requerimiento.show', $requerimiento->id) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('requerimiento.edit', $requerimiento->id) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('requerimiento.destroy', $requerimiento->id) }}" method="POST" class="formulario-eliminar">
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