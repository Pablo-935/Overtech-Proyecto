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


    <div class="container-fluid">

        <div class="row mt-2">
            <div class="col-6">
                <h1>Estado: <p id="estado" class="">{{old('correo_empl', $venta->estado_venta)}}</p></h1>

            </div>
            <div class="col-6 d-flex justify-content-end">
                <h1 class="text-end">Venta Numero: <span class="badge bg-secondary">{{old('correo_empl', $venta->id)}}</span></h1>

            </div>
        </div>



        <div class="row justify-content-center align-items-center my-5">
            <div class="col-10 col-md-6 col-lg-6">



                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Venta DNI:</div>
                            <div class="col-3">{{old('dni_venta', $venta->dni_venta)}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Fecha:</div>
                            <div class="col-3">{{old('fecha_venta', $venta->fecha_venta)}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Hora:</div>
                            <div class="col-3">{{old('hora_venta', $venta->hora_venta)}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Numero de Caja:</div>
                            <div class="col-3">{{old('caja', $venta->caja->numero_caja)}}</div>
                        </div>
                    </li>

                  </ul>






      

            </div>
        </div>

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
        
        
        <div class="row my-3">
            <div class="col-8"></div>
            <div class="col-4 justify-content-end"><h1 class="">Total: &nbsp; <b>{{old('correo_empl', $venta->total_venta)}}</b></h1></div>
        </div>

        <div class="row my-2">
            <div class="col-1"><a class="btn btn-warning" href="{{route('venta.index')}}" role="button">Volver</a></div>
            <div class="col-1"><a class="btn btn-success" href="#" role="button">Facturar</a></div>
            <div class="col-1"><a class="btn btn-danger" href="#" role="button">Anular</a></div>

        </div>

    </div>
    <script src="{{ asset('js/venta_show.js') }}"></script>

@endsection