@extends('adminlte::page')

@section('title', 'Editar Venta')

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
                <h3 class="text-center">Editar Venta</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('venta.update', $venta->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="dni_venta" class="form-label mb-1">DNI ventas: </label>
                            <input type="number" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta', $venta->dni_venta)}}">

                            <label for="fecha_venta" class="form-label mb-1">Fecha: </label>
                            <input type="date" class="form-control mb-1" name="fecha_venta" value="{{old('fecha_venta', $venta->fecha_venta)}}">

                            <label for="hora_venta" class="form-label mb-1">Hora Venta: </label>
                            <input type="time" class="form-control mb-1" name="hora_venta" value="{{old('hora_venta', $venta->hora_venta)}}">

                            <label for="estado_venta" class="form-label mb-1">Estado Venta: </label>
                            <input type="text" class="form-control mb-1" name="estado_venta" value="{{old('estado_venta', $venta->estado_venta)}}">

                            <label for="Empleados" class="col-sm-4 col-form-label">Empleados:</label>
                            <input type="text" class="form-control mb-1" name="empleado_id" value="{{old('Operador', $user->name)}}">

                            {{-- <select id="empleado_id" name="empleado_id" class="form-control">
                                @foreach ($empleados as $empleado)
                                    <option {{ $venta->empleado_id && $venta->empleado_id == $empleado->id ? 'selected': ''}} value="{{ $empleado->id }}"> 
                                        {{ $empleado->nombre_empl }}
                                    </option>
                                @endforeach
                            </select> --}}



                            <label for="caja" class="col-sm-4 col-form-label">Cajas:</label>
                            <select id="caja_id" name="caja_id" class="form-control">
                                @foreach ($cajas as $caja)
                                    <option {{ $venta->caja_id && $venta->caja_id == $caja->id ? 'selected': ''}} value="{{ $caja->id }}"> 
                                        {{ $caja->id }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="clientes" class="col-sm-4 col-form-label">Clientes:</label>
                            <select id="clientes" name="cliente_id" class="form-control">
                                @foreach ($clientes as $cliente)
                                    <option {{ $venta->cliente_id && $venta->cliente_id == $cliente->id ? 'selected': ''}} value="{{ $cliente->id }}"> 
                                        {{ $cliente->nombre_cli }}
                                    </option>
                                @endforeach
                            </select>

                            <h2 class="mt-4">Detalle Venta: </h2>

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
                                    <tr>
                                        <td>

                                         @foreach($detalleVenta as $detalle)
                                    <tr>
                                        <td>
                                            <select id="producto_id" name="producto_id" class="form-control">
                                                @foreach ($productos as $producto)
                                                    <option {{ $detalle->producto->id && $detalle->producto->id == $producto->id ? 'selected': ''}} value="{{ $producto->id }}"> 
                                                        {{ $producto->nombre_prod }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{{$detalle->producto->precio_uni_prod }}</td>
                                        <td>
                                            <input type="text" class="form-control mb-1" name="cantidad_prod_venta" value="{{old('cantidad_prod_venta', $detalle->cantidad_prod_venta)}}">

                                        </td>
                                        <td>
                                            <input type="text" class="form-control mb-1" name="sub_total_det_venta" value="{{old('sub_total_det_venta', $detalle->sub_total_det_venta)}}">

                                        </td>
                                    </tr>
                                    @endforeach

                                
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            <label for="total_venta" class="form-label mb-1">Total Venta: </label>
                            <input type="number" class="form-control mb-1" name="total_venta" value="{{old('total_venta', $venta->total_venta)}}">

                                 <!-- Suponiendo que $detalleVenta es una colección de detalles de venta -->
                           
                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Venta</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('venta.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection