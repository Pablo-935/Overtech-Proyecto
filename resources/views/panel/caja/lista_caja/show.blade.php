@extends('adminlte::page')

@section('title', 'Detalle de Caja')

@section('content_header')
    
@section('js')
<script src="{{ asset('js/caja_edit.js') }}"></script>
@endsection
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-1">
            <h1>Detalle de Caja</h1>

        </div>

            

            <div class="container border p-5 mt-2">
                <div class="row justify-content-center align-items-center my-1">
                    <div class="col-10 col-md-6 col-lg-6">



                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Numero de caja:</div>
                                    <div class="col-3">{{ old('numero_caja', $caja->numero_caja) }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Operador:</div>
                                    <div class="col-3">{{ old('user_id', $caja->user->name) }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Saldo Inicial:</div>
                                    <div id="saldo_inicial_caja" class="col-3">${{ number_format(old('saldo_inicial_caja', $caja->saldo_inicial_caja), 2) }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Fecha Apertura de Caja:</div>
                                    <div class="col-3">{{ old('fecha_hs_aper_caja', $caja->fecha_hs_aper_caja) }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Hora Apertura de Caja:</div>
                                    <div class="col-3">{{ old('fecha_hs_aper_caja', $caja->hs_aper_caja) }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Fecha Cierre de Caja:</div>
                                    <div class="col-3">{{ old('fecha_hs_aper_caja', $caja->fecha_hs_cier_caja) }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Hora Cierre de Caja:</div>
                                    <div class="col-3">{{ old('fecha_hs_aper_caja', $caja->hs_cier_caja) }}</div>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Total de Ingresos:</div>
                                    <div id="total_ingresos_caja" class="col-3">$ {{ number_format(old('total_ingresos_caja', $caja->total_ingresos_caja) )}}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Total de Egresos:</div>
                                    <div id="total_egresos_caja" class="col-3">$ {{ number_format(old('total_ingresos_caja', $caja->total_egresos_caja)) }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">Total Saldo Caja:</div>
                                    <div id="total_saldo_caja" class="col-3">$ {{ number_format(old('total_saldo_caja', $caja->total_saldo_caja)) }}</div>
                                </div>
                            </li>
        
                          </ul>
        
                    </div>
                </div>



                <form action="{{route('caja.update', $caja->id)}}" method="POST" novalidate>
                    @csrf @method('PUT')
                    <input type="hidden" class="form-control" id="hs_cier_caja" name="hs_cier_caja" aria-describedby="emailHelp" value="{{ old('hs_cier_caja') }}">

                    <a class="btn btn-warning" href="{{ route('caja.index') }}" role="button">Volver</a>
            
                  </form>
            </div>




    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop