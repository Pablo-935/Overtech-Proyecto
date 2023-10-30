@extends('adminlte::page')

@section('title', 'Hacer Venta')

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
                <h3 class="text-center">Nueva Venta</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('venta.store')}}" method="POST" novalidate>
                            @csrf 

                            <label for="dni_venta" class="form-label mb-1">DNI ventas: </label>
                            <input type="number" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta')}}">

                            <label for="fecha_venta" class="form-label mb-1">Fecha: </label>
                            <input type="date" class="form-control mb-1" id="fecha_venta" name="fecha_venta" value="{{old('fecha_venta')}}">

                            <label for="hora_venta" class="form-label mb-1">Hora Venta: </label>
                            <input type="time" class="form-control mb-1" id="hora_venta" name="hora_venta" value="{{old('hora_venta')}}">

                            <label for="total_venta" class="form-label mb-1">Total Venta: </label>
                            <input type="number" class="form-control mb-1" name="total_venta" value="{{old('total_venta')}}">

                            {{-- <label for="estado_venta" class="form-label mb-1">Estado Venta: </label>
                            <input type="text" class="form-control mb-1" name="estado_venta" value="{{old('estado_venta')}}"> --}}

                            <label for="Empleados" class="col-sm-4 col-form-label">Empleados:</label>
                            <select id="empleado_id" name="empleado_id" class="form-control mb-1">
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}"> 
                                        {{ $empleado->nombre_empl }}
                                    </option>
                                @endforeach
                            </select>     

                            <label for="caja" class="col-sm-4 col-form-label">Cajas:</label>
                            <select id="caja_id" name="caja_id" class="form-control mb-1">
                                @foreach ($cajas as $caja)
                                    <option value="{{ $caja->id }}"> 
                                        {{ $caja->id }}
                                    </option>
                                @endforeach
                            </select>   

                            <label for="clientes" class="col-sm-4 col-form-label">Clientes:</label>
                            <select id="clientes" name="cliente_id" class="form-control mb-1">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"> 
                                        {{ $cliente->id }}
                                    </option>
                                @endforeach
                            </select>   

                            <h2>Detalle Venta: </h2>

                            <table class="table table-sm table-striped table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select id="clientes" name="producto_id" class="form-control mb-1">
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}"> 
                                                        {{ $producto->nombre_prod }}
                                                    </option>
                                                @endforeach
                                            </select>   

                                        </td>
                                        <td>
                                            <input type="number" class="form-control mb-1" name="cantidad_prod_venta" value="{{old('cantidad_prod_venta')}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control mb-1" name="sub_total_det_venta" value="{{old('sub_total_det_venta')}}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                                 <!-- Suponiendo que $detalleVenta es una colección de detalles de venta -->
                           
                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Venta</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('venta.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/venta_create.js') }}"></script>




    
@endsection