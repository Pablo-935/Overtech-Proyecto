@extends('adminlte::page')

@section('title', 'Hacer Venta')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@if (session('alert1'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert1') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif









        <div class="card m-3">
            <div class="card-header bg-primary text">Nueva Venta</div>
            <div class="card-body">
                <form action="{{route('venta.store')}}" method="POST" novalidate>
                    @csrf 
    
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">DNI Cliente</span>
                                    <input type="number" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta')}}">
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
                                        @foreach ($empleados as $empleado)
                                            <option value="{{ $empleado->id }}"> 
                                                {{ $empleado->nombre_empl }}
                                            </option>
                                        @endforeach
                                    </select>     
                                </div>
                            </div>
    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Caja</span>
                                    <select id="caja_id" name="caja_id" class="form-control mb-1">
                                        @foreach ($cajas as $caja)
                                            <option value="{{ $caja->id }}"> 
                                                {{ $caja->id }}
                                            </option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
    
                            <div class="col-4 mb-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">CLiente</span>
                                    <select id="clientes" name="cliente_id" class="form-control mb-1">
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}"> 
                                                {{ $cliente->id }}
                                            </option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="mb-5">Venta</h2>

                        <select style="width: 200px" name="producto_id" id="producto_id" multiple>
                            @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-id="{{ $producto->id }}" data-codigo="{{ $producto->codigo_prod }}" data-nombre="{{ $producto->nombre_prod }}" data-stock="{{ $producto->stock_actual_prod }}" data-precio="{{ $producto->precio_uni_prod }}"> 
                                {{ $producto->nombre_prod }}
                            </option>
                        @endforeach
                        </select>

                        <button id="seleccionar" type="button" class="btn btn-primary">Seleccionar</button>


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

                    
                    <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Venta</button>
                    <a class="btn btn-warning btn-sm mt-3" href="{{route('venta.index')}}" role="button">Volver</a>      
                </form>
                
            </div>
        </div>







            </div>

    <script src="{{ asset('js/venta_create.js') }}"></script>
    


<script>

</script>

<style>
    #producto_id + .select2-container .select2-selection .select2-selection__choice {
        color: black;
    }
</style>

    
@endsection