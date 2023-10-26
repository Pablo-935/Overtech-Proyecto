@extends('layouts.app')

@section('title', 'crear un nuevo Producto')

@section('content')

<h1 class="text-center mt-5">Crear un nuevo producto</h1>


<div class="container w-25 border p-5 mt-5">
    <form action="{{route('products.store')}}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{ old('name') }}">
        @error('name')
            {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea cols="30" rows="10" name="description" aria-describedby="emailHelp" value="{{ old('description') }}"> </textarea>
            @error('description')
            {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Precio Unitario</label>
          <input type="text" class="form-control" name="unit_price" aria-describedby="emailHelp" value="{{ old('unit_price') }}">
          @error('unit_price')
          {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock" aria-describedby="emailHelp" value="{{ old('stock') }}">
            @error('stock')
            {{ $message }}
          @enderror
        </div>

          
        <button type="submit" class="btn btn-success">Guardar Productos</button>
        <a class="btn btn-danger" href="{{ route('products.index') }}" role="button">Cancelar</a>

      </form>
</div>

@endsection