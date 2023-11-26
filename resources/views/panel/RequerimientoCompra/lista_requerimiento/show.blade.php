@extends('adminlte::page')

@section('title', 'Ver Detalle Requerimiento')

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}
    <div class="container-fluid ">
        <a href="{{ route('exportar-requerimientos-pdf', $requerimiento->id)}}" class="btn btn-danger" title="PDF" target="_blank">
            <i class="fas fa-file-pdf m-1"></i>PDF
        </a>

        <div class="card mt-3">
            
            <div class="card-header bg-primary text">Requerimiento Nº: {{$requerimiento->id}}</div>
            <div class="card-body">
                <form id="requerimiento" method="POST" novalidate>
                    @csrf 

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fecha Requerimiento</span>
                                <input type="date" class="form-control" name="fecha_requer_comp" value="{{old('fecha_requer_comp', $requerimiento->fecha_requer_comp)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                <input type="text" class="form-control" name="estado_requer_comp" value="{{old('estado_requer_comp', $requerimiento->estado_requer_comp)}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                <input type="text" class="form-control" name="usuario_id" value="{{old('usuario', $requerimiento->user->name)}}" disabled>
                            </div>
                        </div>
                    </div>


                    <h5 class="">Detalle Requerimiento</h5>

                    <table id="miTabla" class="table table-sm table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th>Nº Detalle</th>
                                <th>Nº Requerimiento:</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalleRequerimiento as $detalle)
                            <tr>
                                <td>{{$detalle->id }}</td>
                                <td>{{$detalle->RequerimientoCompra->id }}</td>
                                <td>{{$detalle->producto->nombre_prod }}</td>
                                <td>{{$detalle->cantidad_requer_prod}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>    
                </form>
            </div>
    </div> 
    
    
    
@endsection