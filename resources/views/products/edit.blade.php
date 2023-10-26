@extends('layouts.app')

@section('title', 'Edicion del producto #'. $product->id)

@section('content')

<h1 class="text-center mt-5">Editar el producto {{ $product->name }}</h1>


<div class="container w-25 border p-5 mt-5">
    <form action="{{route('products.update', $product->id)}}" method="POST" novalidate>
        @csrf @method('PUT')

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{ old('name', $product->name) }}">
        @error('name')
            {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea cols="30" rows="10" name="description" aria-describedby="emailHelp" >{{ old('description', $product->description) }}</textarea>
            @error('description')
            {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Precio Unitario</label>
          <input type="text" class="form-control" name="unit_price" aria-describedby="emailHelp" value="{{ old('unit_price', $product->unit_price) }}">
          @error('unit_price')
          {{ $message }}
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock" aria-describedby="emailHelp" value="{{ old('stock', $product->stock) }}">
            @error('stock')
            {{ $message }}
          @enderror
        </div>

          
        <button type="submit" class="btn btn-success">Actualizar Producto</button>
        <a class="btn btn-danger" href="{{ route('products.index') }}" role="button">Cancelar</a>

      </form>
</div>

@endsection