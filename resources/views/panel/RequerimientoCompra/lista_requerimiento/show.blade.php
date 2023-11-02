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
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-6">
                <h3 class="text-center">Requerimiento Nº: {{$requerimiento->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="venta_id" class="form-label mb-1">ID: </label>
                            <input type="number" class="form-control mb-1" name="venta_id" value="{{old('venta_id', $requerimiento->id)}}" disabled>

                            <label for="dni_venta" class="form-label mb-1">Fecha Requerimiento: </label>
                            <input type="text" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta', $requerimiento->fecha_requer_comp)}}" disabled>

                            <label for="estado_requer_comp" class="form-label mb-1">Estado: </label>
                            <input type="text" class="form-control mb-1" name="estado_requer_comp" value="{{old('estado_requer_comp', $requerimiento->estado_requer_comp)}}" disabled>

                            <label for="empleado_id" class="form-label mb-1">Empleado: </label>
                            <input type="text" class="form-control mb-1" name="empleado_id" value="{{old('empleado_id', $requerimiento->empleado->nombre_empl)}}">
                            
                            <h2>Detalle Requerimiento: </h2>
                            

                            <table class="table table-sm table-striped table-hover w-100">
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
            </div>
        </div>
    </div>
@endsection