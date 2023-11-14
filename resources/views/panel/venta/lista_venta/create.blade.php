@extends('adminlte::page')

@section('title', 'Hacer Venta')

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2-i18n@latest/dist/js/i18n/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('js/venta_create.js') }}"></script>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endsection

@section('content')




@if (session('alert1'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert1') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@foreach ($cotizacion as $cotizaciones)
    @if ($cotizaciones->nombre_cotizacion === 'DOLAR')
    <input type="hidden" class="form-control mb-1" id="valor_dolar" name="valor_dolar" value="{{ $cotizaciones->valor_cotizacion }}">
    @endif
@endforeach

@foreach ($cotizacion as $cotizaciones)
    @if ($cotizaciones->nombre_cotizacion === 'VENTA')
        <input type="hidden" class="form-control mb-1" id="valor_venta" value="{{ $cotizaciones->valor_cotizacion }}" >
    @endif
@endforeach


        <div class="card m-3">
            <div class="card-header bg-primary text">Nueva Venta</div>
            <div class="card-body">
                <form id="form" action="{{route('venta.store')}}" method="POST" novalidate>
                    @csrf 
    
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">DNI Pedido</span>
                                    <input type="number" class="form-control mb-1" id="dni_venta" name="dni_venta" value="{{old('dni_venta')}}">
                                    <div class="alert_dni"></div>
                                </div>
                            </div>
    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
                                    <input type="date" class="form-control mb-1" id="fecha_venta" name="fecha_venta" value="{{old('fecha_venta')}}">
                                </div>
                            </div>
    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Hora</span>
                                    <input type="time" class="form-control mb-1" id="hora_venta" name="hora_venta" value="{{old('hora_venta')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Operador</span>
                                    <select id="empleado_id" name="empleado_id" class="form-control mb-1">
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    </select>     
                                </div>
                            </div>
    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Estado Caja</span>
                                    <select id="caja_id" name="caja_id" class="form-control mb-1">
                                        @php
                                            $cajaAbiertaEncontrada = false;
                                        @endphp
                                    
                                        @foreach ($cajas as $caja)
                                            @if ($caja->abierta_caja === 'Si' && !$cajaAbiertaEncontrada)
                                                <option value="{{ $caja->id }}" data-estado="{{ $caja->abierta_caja }}">Caja Abierta</option>
                                                @php
                                                    $cajaAbiertaEncontrada = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                    
                                        @if (!$cajaAbiertaEncontrada)
                                            <option value="NO">Caja Cerrada</option>
                                        @endif
                                    </select>
                                    
                                </div>
                            </div>
    
                            <div class="col-4 mb-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">CLiente</span>
                                    <select style="width: 350px; height: 500px;" id="clientes" name="cliente_id" class="form-control mb-1">
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}"> 
                                                {{ $cliente->nombre_cli }}
                                            </option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="mb-5">Venta</h2>

                        <div class="row justify-content-end">

                            <div class="col-3">

                            </div>

                            <div class="col-3">
                                <select style="width: 200px" name="producto_id" id="producto_id" multiple>
                                    @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-id="{{ $producto->id }}" data-codigo="{{ $producto->codigo_prod }}" data-nombre="{{ $producto->nombre_prod }}" data-stock="{{ $producto->stock_actual_prod }}" data-precio="{{ $producto->precio_uni_prod }}"> 
                                        {{ $producto->codigo_prod }} - {{ $producto->nombre_prod }}
                                    </option>
                                @endforeach
                                </select>
                                <button id="seleccionar" type="button" class="btn btn-primary ">Seleccionar</button>

        
                            </div>

                        </div>



                    <table id="tablaProductos" class="table mt-5">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Stock</th>
                                <th>Sub total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    
                    
    
    <div class="tabla-container">

    </div>

    
                    <div class="row mt-4">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="inputGroup-sizing-default">Total</span> --}}
                                <h4 class="total_ver"></h4>
                                <input type="hidden" class="form-control mb-1" name="total_venta" id="total_venta" value="{{ old('total_venta', 0) }}">
                            </div>

                            <input type="hidden" id="contador" name="contador">
                        </div>
                    </div>


                    <button type="submit" id="venta_guardar" class="btn btn-success btn-sm mt-3">Guardar Venta</button>
                    <div class="d-none text-danger" id="mensaje"></div>
                    <div class="d-none text-danger" id="mensaje2"></div>

                </form>
                
            </div>
        </div>







            </div>

    




<style>
    #producto_id + .select2-container .select2-selection .select2-selection__choice {
        color: black;
    }

</style>

    
@endsection