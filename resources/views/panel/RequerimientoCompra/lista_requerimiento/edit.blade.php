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
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header bg-primary text">Requerimiento Nº: {{$requerimiento->id}}</div>
            <div class="card-body">
                <form action="{{route('requerimiento.update', $requerimiento->id)}}" id="requerimiento" method="POST" novalidate>
                    @csrf @method('PUT')

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fecha Requerimiento</span>
                                <input type="date" class="form-control" name="fecha_requer_comp" value="{{old('fecha_requer_comp', $requerimiento->fecha_requer_comp)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                <input type="text" class="form-control" name="estado_requer_comp" value="{{old('estado_requer_comp', $requerimiento->estado_requer_comp)}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                 <select id="usuario_id" name="usuario_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    @foreach ($usuarios as $usuario)
                                        <option {{ $requerimiento->user_id && $requerimiento->user_id == $usuario->id ? 'selected': ''}} value="{{ $usuario->id }}"> 
                                            {{ $usuario->name}}
                                        </option>
                                    @endforeach
                                </select>
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
                                
                                <td>
                                    <a href="" class="btn btn-sm btn-info text-white text-uppercase me-1 eliminar"
                                    data-id= "{{$detalle->id}}">
                                        Eliminar
                                    </a> 
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success btn-sm mt-3">Editar Requerimiento</button>
                    <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>    
                </form>
            </div>
    </div>
@endsection



@section('js')
    {{-- <script src=""{{asset('js/eliminar.js')}}""></script> --}}
    <script>
        $(document).ready(function(){

            let tabla = document.getElementById("miTabla");
            let inputs = document.getElementById("filas");
            inputs.value = tabla.rows.length-1;

            $('.eliminar').on('click', function(e){
                if (tabla.rows.length > 2) {
                    const id = $(this).data('id');
                    $.ajax({
                            url: `{{ env('APP_URL') }}/panel/detalleRequerimientos/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                                // id: id},
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                            
                            },
                            error: function (error) { 
                                consola.log('Error')
                        }
                    });
                } else {
                    alert("Debe haber al menos una fila.");
                }
            });
        });

        // Crear formulario
                // let formulario = document.createElement('form');
                // formulario.id = 'confirmacionEliminarForm';
                // formulario.method = 'POST';

                // formulario.append($('<input>', {
                //     'type': 'hidden',
                //     'name': '_token',
                //     'value': '{{ csrf_token() }}' // Ajusta según tu aplicación
                // }));

                // Agregar un campo oculto para el método DELETE
                // formulario.append($('<input>', {
                //     'type': 'hidden',
                //     'name': '_method',
                //     'value': 'DELETE'
                // }));
    </script>
@stop