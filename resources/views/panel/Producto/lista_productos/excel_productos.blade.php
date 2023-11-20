<table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio Unitario</th>
            <th>Descripción</th>
            <th>Stock minimo</th>
            <th>Stock actual</th>
            <th>Stock maximo</th>
            <th>Categoria</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->codigo_prod }}</td>
            <td>{{ $producto->nombre_prod }}</td>
            <td>{{ $producto->precio_uni_prod }}</td>
            <td>{{ Str::limit($producto->descripcion_prod, 30) }}</td>
            <td>{{ $producto->stock_min_prod }}</td>
            <td>{{ $producto->stock_actual_prod }}</td>
            <td>{{ $producto->stock_max_prod }}</td>
            <td>{{ $producto->categoria->nombre_cat }}</td>
        </tr>
        @endforeach
        </tbody>
</table>