@extends('adminlte::page')

@section('title', 'Abrir Caja')

@section('content')

@if (session('alert3'))
<div class="col-12">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('alert3') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if (session('alert1'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert1') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-6">
                <h3 class="text-center">Abrir Caja</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('caja.store')}}" method="POST" novalidate>
                            @csrf 
                            {{-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Numero de caja</label>
                                <input type="text" class="form-control" name="numero_caja" aria-describedby="emailHelp" value="{{ old('numero_caja') }}">
                              @error('numero_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div> --}}
        
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Operador</label>
                                <select id="usuario_id" name="usuario_id" class="form-control mb-1">
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                </select>
                                
                                
                              @error('Operador')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>
        
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Saldo Inicial</label>
                                <input type="number" id="saldo_inicial" class="form-control" name="saldo_inicial_caja" aria-describedby="emailHelp" value="" placeholder="$ 0.00">
                              @error('saldo_inicial_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>
        
                              <div class="mb-3">
                                {{-- <label for="exampleInputEmail1" class="form-label">Fecha Apertura de Caja</label> --}}
                                <input type="hidden" class="form-control" id="fecha_hs_aper_caja" name="fecha_hs_aper_caja" aria-describedby="emailHelp" value="{{ old('fecha_hs_aper_caja') }}">
                              @error('fecha_hs_aper_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>
        
                              <div class="mb-3">
                                {{-- <label for="exampleInputEmail1" class="form-label">Total de Ingresos</label> --}}
                                <input type="hidden" class="form-control" name="total_ingresos_caja" aria-describedby="emailHelp" value="0">
                              @error('total_ingresos_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>
        
                              <div class="mb-3">
                                {{-- <label for="exampleInputEmail1" class="form-label">Total de Egresos</label> --}}
                                <input type="hidden" class="form-control" name="total_egresos_caja" aria-describedby="emailHelp" value="0">
                              @error('total_egresos_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>
        
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Total Saldo Caja</label>
                                <input type="number" id="saldo_total" class="form-control" name="total_saldo_caja" aria-describedby="emailHelp" value="" placeholder="$ 0.00">
                              @error('total_saldo_caja')
                              <p class="text-danger"> {{ $message }} </p>
                              @enderror
                              </div>  


                            
                                 <!-- Suponiendo que $detalleVenta es una colección de detalles de venta -->
                           
                            <button type="submit" class="btn btn-success btn-sm mt-3">Abrir Caja</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('caja.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/caja_create.js') }}"></script>




    
@endsection