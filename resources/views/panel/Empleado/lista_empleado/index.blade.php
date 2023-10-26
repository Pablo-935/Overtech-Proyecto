@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Categorías')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Empleados</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('empleado.create') }}" class="btn btn-success text-uppercase">
                Nuevo empleado
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
                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">dni</th>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">apellido</th>
                            <th scope="col" class="text-uppercase">celular</th>
                            <th scope="col" class="text-uppercase">correo</th>
                            <th scope="col" class="text-uppercase">domicilio</th>
                            <th scope="col" class="text-uppercase">tipo</th>
                            <th scope="col" class="text-uppercase">usuario</th>
                            <th scope="col" class="text-uppercase">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->dni_empl }}</td>
                            <td>{{ $empleado->nombre_empl}}</td>
                            <td>{{ $empleado->apellido_empl }}</td>
                            <td>{{ $empleado->celular_empl }}</td>
                            <td>{{ $empleado->correo_empl }}</td>
                            <td>{{ $empleado->domicilio_empl }}</td>
                            <td>{{ $empleado->tipo_empl }}</td>
                            <td>{{ $empleado->user->name }}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('empleado.show', $empleado->id) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('empleado.edit', $empleado->id) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST" class="formulario-eliminar">
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