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
                        <form action="{{route('requerimiento.update', $requerimiento->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="fecha_requer_comp" class="form-label mb-1">Fecha Requerimiento: </label>
                            <input type="text" class="form-control mb-1" name="fecha_requer_comp" value="{{old('fecha_requer_comp', $requerimiento->fecha_requer_comp)}}">

                            <label for="estado_requer_comp" class="form-label mb-1">Estado: </label>
                            <input type="text" class="form-control mb-1" name="estado_requer_comp" value="{{old('estado_requer_comp', $requerimiento->estado_requer_comp)}}">
                            
                            <label for="Empleados" class="col-sm-4 col-form-label">Empleados:</label>
                            <select id="empleado_id" name="empleado_id" class="form-control">
                                @foreach ($empleados as $empleado)
                                    <option {{ $requerimiento->empleado_id && $requerimiento->empleado_id == $empleado->id ? 'selected': ''}} value="{{ $empleado->id }}"> 
                                        {{ $empleado->nombre_empl }}
                                    </option>
                                @endforeach
                            </select>


                            <h2>Detalle Requerimiento: </h2>
                            

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
                                    <input id="filas" class="d-none" type="number" name="filas" value="1">
                                    @foreach($detalleRequerimiento as $detalle)
                                    <tr>
                                        <input id="detalle" class="d-none" type="number" name="detalle[]" value="{{$detalle->id}}">
                                        <td>{{$detalle->id }}</td>
                                        <td>{{$detalle->RequerimientoCompra->id }}</td>
                                        <td>
                                            <select id="producto_id" name="producto_id[]" class="form-control">
                                                @foreach ($productos as $producto)
                                                    <option {{ $detalle->producto->id && $detalle->producto->id == $producto->id ? 'selected': ''}} value="{{ $producto->id }}"> 
                                                        {{ $producto->nombre_prod }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control mb-1" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod', $detalle->cantidad_requer_prod)}}">
                                        </td>

                                        {{-- <td>
                                            
                                            {{ $detalle->id}}
                                            <form action="{{ route('detalleRequerimiento.destroy', $detalle->id) }}" method="POST" id="eliminar">
                                                @csrf 
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn btn-sm btn-danger text-uppercase" onclick="eliminarFila(this)"> --}}
                                                    {{-- <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                    Eliminar
                                                    </button> --}}
                                            {{-- </form> --}}
                                        {{-- </td> --}} 

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <button type="submit" class="btn btn-success btn-sm mt-3">Editar Requerimiento</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var table = document.getElementById("miTabla");
        let inputs = document.getElementById("filas");
        inputs.value = table.rows.length-1;
        console.log(inputs.value)

        // function eliminarFila(button) {
        //     var table = document.getElementById("miTabla");
        //     if (table.rows.length > 2) { // Verifica si hay más de una fila (la primera siempre se mantendrá)
        //         let row = button.parentNode.parentNode;
        //         row.parentNode.removeChild(row);

        //         // Actualiza los IDs de los campos de stock
        //         for (var i = 1; i < table.rows.length; i++) {
        //             var uniqueStockId = 'stock_' + i;
        //             table.rows[i].cells[1].firstElementChild.id = uniqueStockId;
        //         }
        //     } else {
        //         alert("Debe haber al menos una fila.");
        //     }
        // }
    </script>
@endsection