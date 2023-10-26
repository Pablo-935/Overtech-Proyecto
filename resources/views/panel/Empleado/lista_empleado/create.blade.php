@extends('adminlte::page')

@section('title', 'Crear Nuevo Empleado')

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
                <h3 class="text-center">Crear Empleado</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('empleado.store')}}" method="POST" novalidate>
                            @csrf 

                            <label for="dni_empl" class="form-label mb-1">DNI: </label>
                            <input type="number" class="form-control mb-1" name="dni_empl" value="{{old('dni_empl')}}">

                            <label for="nombre_empl" class="form-label mb-1">Nombre: </label>
                            <input type="text" class="form-control mb-1" name="nombre_empl" value="{{old('nombre_empl')}}">

                            <label for="apellido_empl" class="form-label mb-1">Apellido: </label>
                            <input type="text" class="form-control mb-1" name="apellido_empl" value="{{old('apellido_empl')}}">

                            <label for="celular_empl" class="form-label mb-1">Celular: </label>
                            <input type="text" class="form-control mb-1" name="celular_empl" value="{{old('celular_empl')}}">

                            <label for="correo_empl" class="form-label mb-1">Correo: </label>
                            <input type="text" class="form-control mb-1" name="correo_empl" value="{{old('correo_empl')}}">

                            <label for="domicilio_empl" class="form-label mb-1">Domicilio: </label>
                            <input type="text" class="form-control mb-1" name="domicilio_empl" value="{{old('domicilio_empl')}}">

                            
                            <label for="tipo_empl" class="form-label mb-1">Tipo: </label>
                            <select name="tipo_empl" class="form-control">
                                <option value="Vendedor">Vendedor</option>
                                <option value="Repositor">Repositor</option>
                                <option value="Cajero">Cajero</option>
                            </select>
                            
                            <label for="categoria" class="col-sm-4 col-form-label">Usuarios</label>
                            <select id="usuario_empl" name="usuario_empl" class="form-control mb-1">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}"> 
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>                
                            
                            <label for="fecha_alta_empl" class="form-label mb-1">Fecha Contratación: </label>
                            <input type="date" class="form-control mb-1" name="fecha_alta_empl" value="{{old('fecha_alta_empl')}}">
                        
                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Empleado</button>
                            <a class="btn btn-warning btn-sm mt-3" href="{{route('empleado.index')}}" role="button">Volver</a>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection