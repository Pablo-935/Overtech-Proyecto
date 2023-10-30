@extends('adminlte::page')

@section('title', 'Ver Detalle Venta')

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}
    <h1>Estado: <span class="badge bg-warning">{{old('correo_empl', $venta->estado_venta)}}</span></h1>


    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-6">
                <h3 class="text-center">Venta Nº: {{$venta->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="dni_empl" class="form-label mb-1">ID: </label>
                            <input type="number" class="form-control mb-1" name="venta_id" value="{{old('venta_id', $venta->id)}}" disabled>

                            <label for="nombre_empl" class="form-label mb-1">DNI ventas: </label>
                            <input type="text" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta', $venta->dni_venta)}}" disabled>

                            <label for="apellido_empl" class="form-label mb-1">Fecha: </label>
                            <input type="text" class="form-control mb-1" name="apellido_empl" value="{{old('apellido_empl', $venta->fecha_venta)}}" disabled>

                            <label for="celular_empl" class="form-label mb-1">Hora: </label>
                            <input type="text" class="form-control mb-1" name="celular_empl" value="{{old('celular_empl', $venta->hora_venta)}}" disabled>

                            <label for="correo_empl" class="form-label mb-1">Venta: </label>
                            <input type="text" class="form-control mb-1" name="correo_empl" value="{{old('correo_empl', $venta->total_venta)}}" disabled>

                            <label for="Estado" class="form-label mb-1">Venta: </label>
                            <input type="text" class="form-control mb-1" name="estado_venta" value="{{old('correo_empl', $venta->estado_venta)}}" disabled>
                            <h2>Detalle Venta: </h2>
                            

                            <table class="table table-sm table-striped table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio Unitario</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detalleVenta as $detalle)
                                
                                    <tr>
                                        <td>{{$detalle->producto->nombre_prod }}</td>
                                        <td>{{$detalle->producto->precio_uni_prod }}</td>
                                        <td>{{$detalle->cantidad_prod_venta}}</td>
                                        <td>{{$detalle->sub_total_det_venta}}</td>
                                    </tr>
                                    <!-- Aquí puedes acceder a las propiedades de cada detalle de venta -->
                                    <!-- Añade más propiedades según tus necesidades -->
                                    @endforeach
                                </tbody>
                            </table>
                            
                                 <!-- Suponiendo que $detalleVenta es una colección de detalles de venta -->
                           

                            <a class="btn btn-warning btn-sm mt-3" href="{{route('venta.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection