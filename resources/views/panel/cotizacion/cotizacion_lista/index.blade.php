{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Cotizaciones')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Cotizaciones</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('cotizacion.create') }}"  class="btn btn-success text-uppercase">
                Nueva Cotizacion
            </a>
        </div>
        
        @if (session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('status2'))
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('status2') }}
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
                <table id="tabla-productos" class="table table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Valor</th>
                            <th scope="col" class="text-uppercase">Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizacion as $cotizaciones)
                        <tr>
                            <td>{{ $cotizaciones->nombre_cotizacion }}</td>
                            <td>{{ $cotizaciones->valor_cotizacion }}</td>
                            <td style="width: 0%" >
                                <div class="d-flex">
                                    
                                    <a href="{{ route('cotizacion.edit', $cotizaciones->id) }}" class="btn btn-sm btn-warning text-white text-uppercase mx-2 ">
                                        Editar
                                    </a>

                                    <form action="{{ route('cotizacion.destroy', $cotizaciones->id) }}" method="POST" class="form_delete">
                                        @csrf @method('DELETE')
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-uppercase ">
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

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/cotizacion.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    

    <script>

    $('.form_delete').submit(function (e) {
        e.preventDefault();


    Swal.fire({
  title: 'Estas seguro de eliminar este producto ?',
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


    </script>


@stop