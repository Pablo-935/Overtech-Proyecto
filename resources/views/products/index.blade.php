@extends('layouts.app')

@section('title', 'Listado de Productos')


@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif


    @if('$products->count()')
    <div class="container">
        <a class="btn btn-primary mt-5" href="{{ route('products.create') }}" role="button">Agregar un Nuevo Producto</a>

    <table class="table table-bordered mt-3 " id="tabla">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO UNITARIO</th>
                <th>STOCK</th>
                <th>ULTIMA ACUTALIZACION</th>
                <th>OPCIONES</th>

            </tr>
        </thead>
            <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>{{ $product->stock}}</td>
                <td>{{ $product->updated_at }}</td>
                <td class="text-center">
                    <div class="row">
                        <div class="col-2"><a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}" role="button">VER</a></div>
                        <div class="col-3"><a class="btn btn-warning btn-sm" href="{{ route('products.edit', $product->id) }}" role="button">EDITAR</a></div>
                        <div class="col-4"><form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
                    </form></div>
                    </div>
                
                
                
                
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {!! $products->links() !!}
    </div>
</div>
    @else
    <h4>NO HAY REGISTROS EN LA BASE DE DATOS!!</h4>
    @endif
    @endsection
