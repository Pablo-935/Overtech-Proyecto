@extends('adminlte::page')

@section('title', 'Hacer Requerimiento')

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
                <h3 class="text-center">Nuevo Requerimiento</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('requerimiento.store')}}" method="POST" novalidate>
                            @csrf 

                            <label for="fecha_requer_comp" class="form-label mb-1">Fecha Requerimiento: </label>
                            <input type="date" class="form-control mb-1" name="fecha_requer_comp" value="{{old('fecha_requer_comp')}}">

                            <label for="estado_requer_comp" class="form-label mb-1">Estado: </label>
                            <input type="text" class="form-control mb-1" name="estado_requer_comp" value="{{old('estado_requer_comp')}}">

                            <label for="Empleados" class="col-sm-4 col-form-label">Empleados:</label>
                            <select id="empleado_id" name="empleado_id" class="form-control mb-1">
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}"> 
                                        {{ $empleado->nombre_empl }}
                                    </option>
                                @endforeach
                            </select>    

                            <h2>Detalle Requerimiento: </h2>

                            <table class="table table-sm table-striped table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
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
                                            <input type="number" class="form-control mb-1" name="cantidad_requer_prod" value="{{old('cantidad_requer_prod')}}">
                                        </td>

                                    </tr>
                                </tbody>
                            </table> 
                            
                                 <!-- Suponiendo que $detalleVenta es una colección de detalles de venta -->
                           
                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Requerimiento</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection