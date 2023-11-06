@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('plugins.SweetAlert2', true)


{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Ventas')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Ventas</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
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
                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100 text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Numero</th>
                            <th scope="col" class="text-uppercase">Dni Venta</th>
                            <th scope="col" class="text-uppercase">Fecha</th>
                            <th scope="col" class="text-uppercase">Hora</th>
                            <th scope="col" class="text-uppercase">Total</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                            <th scope="col" class="text-uppercase">Operador</th>
                            <th scope="col" class="text-uppercase">Numero Caja</th>
                            <th scope="col" class="text-uppercase">Cliente</th>
                            <th scope="col" class="text-uppercase">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->dni_venta}}</td>
                            <td>{{ $venta->fecha_venta }}</td>
                            <td>{{ $venta->hora_venta }}</td>
                            <td>{{ $venta->total_venta }}</td>
                            <td>{{ $venta->estado_venta }}</td>
                            <td>{{ $venta->user->name }}</td>
                            <td>{{ $venta->caja->id}}</td>
                            <td>{{ $venta->cliente->nombre_cli }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('venta.show', $venta->id) }}" class="btn btn-sm btn-info text-white text-uppercase m-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('venta.edit', $venta->id) }}" class="btn btn-sm btn-warning text-white text-uppercase m-1">
                                        Editar
                                    </a>
                                    {{-- <form action="{{ route('venta.destroy', $venta->id) }}" method="POST" class="form_delete">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{asset('js/table.js')}}"></script>

    {{-- <script>

        $('.form_delete').submit(function (e) {
            e.preventDefault();
    
    
        Swal.fire({
      title: 'Estas seguro de eliminar esta Venta ?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Eliminado !',
          '',
          'success'
        )
    
        this.submit()
      }
    })
    
        });
    
    
        </script> --}}

        <script>
            $('.form_delete').submit(function (e) {
                e.preventDefault();
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            });

            
        </script>

@stop

