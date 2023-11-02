@extends('adminlte::page')

@section('title', 'Ver Compra')

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
                <h3 class="text-center">Compra Nº: {{$compra->num_comp}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" novalidate>
                            @csrf 

                            <label for="num_comp" class="form-label mb-1">Nº Compra: </label>
                            <input type="number" class="form-control mb-1" name="num_comp" value="{{old('num_comp', $compra->num_comp)}}" disabled>

                            <label for="fecha_comp" class="form-label mb-1">Fecha Compra: </label>
                            <input type="text" class="form-control mb-1" name="fecha_comp" value="{{old('fecha_comp', $compra->fecha_comp)}}" disabled>

                            <label for="hora_comp" class="form-label mb-1">Hora Compra: </label>
                            <input type="text" class="form-control mb-1" name="hora_comp" value="{{old('hora_comp', $compra->hora_comp)}}" disabled>

                            <label for="monto_comp" class="form-label mb-1">Monto Compra: </label>
                            <input type="text" class="form-control mb-1" name="monto_comp" value="{{old('monto_comp', $compra->monto_comp)}}" disabled>

                            <label for="caja_id" class="form-label mb-1">Caja: </label>
                            <input type="text" class="form-control mb-1" name="caja_id" value="{{old('caja_id', $compra->caja->id)}}">

                            <label for="proveedor_id" class="form-label mb-1">Proveedor: </label>
                            <input type="text" class="form-control mb-1" name="proveedor_id" value="{{old('proveedor_id', $compra->proveedor->nombre_prov)}}">


                            <label for="requerimiento_compra_id" class="form-label mb-1">Nº Requerimiento Compra: </label>
                            <input type="text" class="form-control mb-1" name="requerimiento_compra_id" value="{{old('requerimiento_compra_id', $compra->RequerimientoCompra->id)}}">

                            <label for="requerimiento_compra_id" class="form-label mb-1">Empleado Requerimiento Compra: </label>
                            <input type="text" class="form-control mb-1" name="requerimiento_compra_id" value="{{old('requerimiento_compra_id', $compra->RequerimientoCompra->empleado->nombre_empl)}}">


                            
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('compra.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection