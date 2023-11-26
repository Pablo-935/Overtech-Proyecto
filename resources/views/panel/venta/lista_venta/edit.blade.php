@extends('adminlte::page')

@section('title', 'Ver Venta')


@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2-i18n@latest/dist/js/i18n/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('js/venta_edit.js') }}"></script>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endsection

@section('content')

    <div class="container-fluid">
    
        <form id="form" action="{{route('venta.update', $venta->id)}}" method="POST" novalidate>
   @csrf @method('PUT')




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
                            <input type="hidden" class="form-control mb-1" name="dni_venta" value="{{old('dni_venta', $venta->dni_venta)}}">

                        </div>
                    </li>

                    <li  id="tipofac" class="list-group-item">
                        <div class="row">
                            <div class="col-9">Tipo de Factura:</div>
                            <div class="col-3">
                                <select id="seleccionfac" class="form-select" aria-label="Default select example">
                                    <option value="B">B</option>
                                    <option value="A">A</option>
                                  </select>
                            </div>

                        </div>
                    </li> 


                    <li id="clientelis" class="list-group-item">
                        <div class="row">
                            <div class="col-9">Cliente:</div>
                            
                            <div class="col-3">
                            
                            <select id="clientes" name="cliente_id" class="form-control">
                                @foreach ($clientes as $cliente)
                                    <option {{ $venta->cliente_id && $venta->cliente_id == $cliente->id ? 'selected': ''}} value="{{ $cliente->id }}"> 
                                        {{ $cliente->nombre_cli }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                        <li class="list-group-item">

                        <div class="row">
                            <div class="col-9">Vendedor:</div>
                            <div class="col-3">{{old('dni_venta', $user->name)}}</div>
                            <input type="hidden" class="form-control mb-1" name="empleado_id" value="{{old('Operador', $user->id)}}">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Fecha:</div>
                            <div class="col-3">{{old('fecha_venta', $venta->fecha_venta)}}</div>
                            <input type="hidden" class="form-control mb-1" name="fecha_venta" value="{{old('fecha_venta', $venta->fecha_venta)}}">

                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Hora:</div>
                            <div class="col-3">{{old('hora_venta', $venta->hora_venta)}}</div>
                            <input type="hidden" class="form-control mb-1" name="hora_venta" value="{{old('hora_venta', $venta->hora_venta)}}">

                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">Numero de Caja:</div>
                            <div class="col-3">{{old('caja', $venta->caja->numero_caja)}}</div>
                            <input type="hidden" class="form-control mb-1" name="caja_id" value="{{old('caja_id', $venta->caja_id)}}">

                        </div>
                    </li>

                  </ul>






      

            </div>
        </div>

        <table id="mitabla" class="table table-sm table-striped table-hover w-100">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Subtotal</th>
                    <th>Opciones</th>

                </tr>
            </thead>
            <tbody>

                <input type="hidden" name="contador" id="contador">

                @foreach($detalleVenta as $index => $detalle)
                @if($detalle->cantidad_prod_venta != 0)
                    <tr data-index="{{ $index }}">
                        <input type="hidden" name="detalle_venta_id[]" value="{{ $detalle->id }}">
                        <td>{{$detalle->producto->codigo_prod }}</td>
                        <td>{{$detalle->producto->nombre_prod }}</td>

                        <td><input type="number" class="form-control mb-1 cantidad" name="cantidad_prod_venta[]" value="{{ old('cantidad_prod_venta', $detalle->cantidad_prod_venta) }}">
                        <p class="cantidad2">{{ old('cantidad_prod_venta', $detalle->cantidad_prod_venta) }}</p>
                        </td>

                        <td class="precio-unitario" id="precio-unitario-{{ $index }}">precio unitario aqui</td>

                        <td>{{$detalle->producto->stock_actual_prod }}</td>

                        <select id="producto_id_{{ $index }}" name="producto_id[]" class="form-control d-none">
                            @foreach ($productos as $producto)
                                <option {{ $detalle->producto->id && $detalle->producto->id == $producto->id ? 'selected': ''}} value="{{ $producto->id }}"> 
                                    {{ $producto->nombre_prod }}
                                </option>
                            @endforeach
                        </select>

                        <td name="sub_total">{{$detalle->sub_total_det_venta}}</td>
                        
                        <input type="hidden" class="form-control mb-1" name="sub_total_det_venta[]" value="{{ old('sub_total_det_venta', $detalle->sub_total_det_venta) }}">
                        <td><button type="button" class="btn btn-danger btn-sm eliminar-fila">Eliminar</button></td>
                    </tr>
                @endif
            @endforeach
            


            </tbody>
        </table>
        
        
        <div class="row my-5">
            <div class="col-9"></div>
            <div class="col-3 justify-content-end" ><h1 class="" name="total">Total: &nbsp; <b>{{old('correo_empl', $venta->total_venta)}}</b></h1></div>
            <input type="hidden" class="form-control mb-1" id="total_venta" name="total_venta" value="{{old('total_venta', $venta->total_venta)}}">

        </div>

        <div class="row my-2">
            <a class="btn btn-primary" href="{{route('venta.index')}}" role="button">Volver</a> &nbsp;&nbsp;
            <button type="submit" id="facturar" class="btn btn-success btn-sm ">Facturar</button>
            <button id="anular_boton" type="submit" data-anular-route="{{ route('anular', ['id' => $venta->id]) }}" type="button" class="btn btn-danger ">Anular</button>
            &nbsp;&nbsp;
            <button id="cancelar_boton" type="submit" data-cancelar-route="{{ route('cancelar', ['id' => $venta->id]) }}" type="button" class="btn btn-warning ">Cancelar</button>
            &nbsp;&nbsp;

        </form>

        <a id="facb" href="{{ route('pdfb', $venta->id)}}" class="btn btn-danger ms-5" title="PDF" target="_blank">
            <i class="fas fa-file-pdf">PDF</i>
            </a>

            <a id="faca" href="{{ route('pdfa', $venta->id)}}" class="btn btn-danger ms-5 d-none" title="PDF" target="_blank">
                <i class="fas fa-file-pdf">PDF</i>
                </a>
                <p id="mensaje" class="text-danger d-none"> Cantidad de existencias insuficientes </p>
        </div>

    </div>



@endsection