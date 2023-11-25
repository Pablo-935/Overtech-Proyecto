@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('plugins.SweetAlert2', true)


{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Historial de Caja')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Historial de Caja</h1>
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
                    <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        @if (session('alert3'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('alert3') }}
                    <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <a href="{{ route('grafico-ingegre') }}" class="btn btn-primary mb-3">
                Ver Gráfico de Ingresos y Egresos
            </a>



                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">id</th>
                            <th scope="col" class="text-uppercase">Numero de Caja</th>
                            <th scope="col" class="text-uppercase">Saldo Inicial</th>
                            <th scope="col" class="text-uppercase">Operador</th>
                            <th scope="col" class="text-uppercase">Fecha Apertura</th>
                            <th scope="col" class="text-uppercase">Hora Apertura</th>
                            {{-- <th scope="col" class="text-uppercase">Operador Cierre</th> --}}
                            <th scope="col" class="text-uppercase">Fecha Cierre</th>
                            <th scope="col" class="text-uppercase">Hora Cierre</th>

                            {{-- <th scope="col" class="text-uppercase">Total Ingresos</th> --}}
                            {{-- <th scope="col" class="text-uppercase">Total Egresos</th> --}}
                            <th scope="col" class="text-uppercase">Total Saldo</th>
                            <th scope="col" class="text-uppercase">Abierto</th>
                            <th scope="col" class="text-uppercase">Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($caja as $cajas)
                        <tr>
                            <td>{{ $cajas->id }}</td>
                            <td>{{ $cajas->numero_caja}}</td>
                            <td>{{number_format( $cajas->saldo_inicial_caja) }}</td>
                            <td>{{ $cajas->user->name}}</td>
                            <td>{{ $cajas->fecha_hs_aper_caja }}</td>
                            <td>{{ $cajas->hs_aper_caja }}</td>
                            {{-- <td>{{ $cajas->user_cier_id}}</td> --}}
                            <td>{{ $cajas->fecha_hs_cier_caja }}</td>
                            <td>{{ $cajas->hs_cier_caja }}</td>

                            {{-- <td>{{ $cajas->total_ingresos_caja }}</td> --}}
                            {{-- <td>{{ $cajas->total_egresos_caja }}</td> --}}
                            <td>{{ $cajas->total_saldo_caja}}</td>
                            <td>{{ $cajas->abierta_caja }}</td>
                            <td>
                                @if ($cajas->abierta_caja == "Si")
                                    <a href="{{ route('caja.edit', $cajas->id) }}" class="btn btn-sm btn-success text-white text-uppercase me-1">
                                        Detalles
                                    </a>
                                @endif
                                @if ($cajas->abierta_caja == "No")
                                <a href="{{ route('caja.show', $cajas->id) }}" class="btn btn-sm btn-primary text-white text-uppercase me-1">
                                    Detalles
                                </a>
                            @endif
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

    <script>

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
    
    
        </script>



@stop

