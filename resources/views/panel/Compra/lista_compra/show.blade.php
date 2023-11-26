@extends('adminlte::page')

@section('title', 'Ver Compra')

@section('content')
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header bg-primary text">Compra Nº: {{$compra->num_comp}}</div>
            <div class="card-body">
                <div class="row ">
                    {{-- <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
                            <input type="text" class="form-control" name="proveedor_id" value="{{old('proveedor_id', $compra->proveedor->nombre_prov)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  disabled>
                        </div>
                    </div> --}}
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
                            <input type="date" class="form-control @error('fecha_comp') is-invalid @enderror" id="fecha_compra" name="fecha_comp" value="{{old('fecha_compra', $compra->fecha_comp)}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Hora Compra:</span>
                            <input type="text" class="form-control" name="hora_comp" value="{{old('hora_comp', $compra->hora_comp)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                        </div>
                    </div>
                   
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Número Caja</span>
                            <input type="text" class="form-control" name="caja_id" value="{{old('caja_id', $compra->caja->numero_caja)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">    
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
                            <input type="text" class="form-control" name="proveedor_id" value="{{old('proveedor_id', $compra->proveedor->nombre_prov)}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row align-items-end justify-content-end">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Monto</span>
                                    <input type="number" placeholder="$00,000,000" class="form-control @error('monto_comp') is-invalid @enderror" type="number" name="monto_comp" value="{{old('monto_comp', $compra->monto_comp)}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="row">
                    <div class="col-6">
                        <p class="h4">Nº Requerimiento: {{$requerimiento->id}}</p>
                    </div>
                       <div class="col-6">
                            <p class="h4">Estado: {{$requerimiento->estado_requer_comp}}</p>
                       </div>
                </div>
              
                <table class="table table table-striped table-hover" id="miTabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Precio Costo</th>
                            <th>Stock actual</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requerimiento->DetalleRequerCompra as $detalle)
                        <tr>
                            <td>{{$detalle->producto->codigo_prod}}</td>
                            <td>{{$detalle->producto->nombre_prod}}</td>
                            <td>{{$detalle->producto->precio_uni_prod}}</td>
                            <td>{{$detalle->producto->stock_actual_prod}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>  
                <div class="form-group ">
                    <label for="Mensaje:" >Detalle:</label>
                    {{-- <div style="height: 100px" name="detalle" id="detalle" class="form-control"></div> --}}
                    <textarea disabled name="detalle" value="{{$compra->detalle}}" id="body" cols="100" rows="5" class="form-control @error('detalle') is-invalid @enderror">{{$compra->detalle}}</textarea>
         
                </div>
 
            </div>
            <a class="btn btn-warning btn-sm mt-3" href="{{route('compra.index')}}" role="button">Volver</a>    
        </div>
    </div>
    

    </div>
@endsection