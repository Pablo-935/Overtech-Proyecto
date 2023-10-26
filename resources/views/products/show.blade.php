@extends('layouts.app')

@section('title', 'Edicion del producto #'. $product->id)

@section('content')

<h1 class="text-center mt-5"></h1>


<div class="container p-5 mt-5">

    <div class="card">
        <h5 class="card-header">VISTA</h5>
        <div class="card-body">
          <h5 class="card-title">Producto: {{ $product->name }}</h5>
          <p class="card-text">Descripcion: {{ $product->description }}</p>
          <p class="card-text">Precio Unitario: {{ $product->unit_price }}</p>
          <p class="card-text">Stock: {{ $product->stock }}</p>

          <a class="btn btn-warning" href="{{ route('products.index') }}" role="button">VOLVER</a>
        </div>
      </div>


    
</div>

@endsection