@extends('adminlte::page')

@section('title', 'Editar Empleado')

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
                <h3 class="text-center">Editar Empleado {{$empleado->nombre_empl}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('empleado.update', $empleado->id)}}" method="POST" novalidate>
                            @csrf @method('PUT')

                            <label for="dni_empl" class="form-label mb-1">DNI: </label>
                            <input type="number" class="form-control mb-1 @error('dni_empl') is-invalid @enderror" name="dni_empl" value="{{old('dni_empl', $empleado->dni_empl)}}">
                            @error('dni_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="nombre_empl" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1 @error('nombre_empl') is-invalid @enderror" name="nombre_empl" value="{{old('nombre_empl', $empleado->nombre_empl)}}">
                            @error('nombre_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="apellido_empl" class="form-label mb-1">Apellido: </label>
                            <input type="text" class="form-control mb-1 @error('apellido_empl') is-invalid @enderror" name="apellido_empl" value="{{old('apellido_empl', $empleado->apellido_empl)}}">
                            @error('apellido_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                            <label for="celular_empl" class="form-label mb-1">Celular: </label>
                            <input type="text" class="form-control mb-1 @error('celular_empl') is-invalid @enderror" name="celular_empl" value="{{old('celular_empl', $empleado->celular_empl)}}">
                            @error('celular_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="correo_empl" class="form-label mb-1">Correo: </label>
                            <input type="text"  class="form-control mb-1 @error('correo_empl') is-invalid @enderror" name="correo_empl" value="{{old('correo_empl', $empleado->correo_empl)}}">
                            @error('correo_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="domicilio_empl" class="form-label mb-1">Domicilio: </label>
                            <input type="text" class="form-control mb-1 @error('domicilio_empl') is-invalid @enderror" name="domicilio_empl" value="{{old('domicilio_empl', $empleado->domicilio_empl)}}">
                            @error('domicilio_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            <label for="tipo_empl" class="form-label mb-1">Tipo: </label>
                            <select name="tipo_empl" class="form-control @error('tipo_empl') is-invalid @enderror">
                                <option value="{{old('tipo_empl', $empleado->tipo_empl)}}">{{old('tipo_empl', $empleado->tipo_empl)}}</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Repositor">Repositor</option>
                                <option value="Cajero">Cajero</option>
                            </select>
                            @error('tipo_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="categoria" class="col-sm-4 col-form-label">Usuarios</label>
                            <select id="usuario_empl" name="usuario_empl" class="form-control mb-1 @error('usuario_empl') is-invalid @enderror">
                                <option value="{{ $empleado->user->id}}">{{ $empleado->user->name }}</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}"> 
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach

                                @error('usuario_empl')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </select>                
                            
                            <label for="fecha_alta_empl" class="form-label mb-1">Fecha Contratación: </label>
                            <input type="date"  class="form-control mb-1 @error('fecha_alta_empl') is-invalid @enderror" name="fecha_alta_empl" value="{{old('fecha_alta_empl', $empleado->fecha_alta_empl)}}">
                            @error('fecha_alta_empl')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            <button type="submit" class="btn btn-success btn-sm mt-3">Editar Empleado</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('empleado.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection