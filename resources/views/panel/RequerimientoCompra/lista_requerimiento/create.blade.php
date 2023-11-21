@extends('adminlte::page')

@section('title', 'Hacer Requerimiento')
@section('plugins.Select2', true)

@section('content')

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-primary text">Nuevo Requerimiento</div>
        <div class="card-body">
            <form action="{{route('requerimiento.store')}}" method="POST" novalidate>
                    @csrf 

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fecha Requerimiento</span>
                                <input type="date" class="form-control @error('fecha_requer_comp') is-invalid @enderror"  name="fecha_requer_comp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old('fecha_requer_comp')}}">
                                @error('fecha_requer_comp')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                <input type="text" class="form-control @error('estado_requer_comp') is-invalid @enderror" name="estado_requer_comp" value="{{old('estado_requer_comp')}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                @error('estado_requer_comp')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                <select id="usuario_id" name="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}"> 
                                            {{ $usuario->name}}
                                        </option>
                                    @endforeach
                                </select>   
                                @error('usuario_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    
                <h5 class="">Detalle Requerimiento</h5>

                
                {{-- Modal --}}
                <button type="button" id="nuevo_empleado" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal-nuevo-empleado">
                Agregar Productos
                </button>

                <div class="modal fade " id="modal-nuevo-empleado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                    <div id="modal" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-body ">
                                {{-- Tabla de Productos --}}
                                <table id="tabla-productos" class="table table-sm table-striped table-hover w-100 " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-uppercase">Codigo</th>
                                            <th scope="col" class="text-uppercase">Producto</th>
                                            <th scope="col" class="text-uppercase">Categoria</th>
                                            <th scope="col" class="text-uppercase">Precio costo</th>
                                            <th scope="col" class="text-uppercase">Stock minimo</th>
                                            <th scope="col" class="text-uppercase">Stock actual</th>
                                            {{-- <th scope="col" class="text-uppercase">Imagen</th> --}}
                                            <th scope="col" class="text-uppercase">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->codigo_prod }}</td>
                                            <td>{{ $producto->nombre_prod }}</td>
                                            <td>
                                                @if ($producto->categoria)
                                                    {{ $producto->categoria->nombre_cat }}
                                                @endif
                                            </td>
                                            <td>{{ $producto->precio_uni_prod }}</td>
                                            <td>{{ $producto->stock_min_prod }}</td>
                                            <td>{{ $producto->stock_actual_prod }}</td>
                                            {{-- <td ><img src="{{ $producto->imagen_prod }}" alt="{{ $producto->nombre_prod }}" class="img-fluid" style="width: 75px;"></td> --}}
                                            <td class="text-center">
                                                <a class="agregarProductos btn btn-sm btn-warning"
                                                data-id= "{{$producto->id}}"
                                                data-codigo="{{$producto->codigo_prod}}"
                                                data-nombre="{{$producto->nombre_prod}}"
                                                data-categoria="{{$producto->categoria->nombre_cat}}"
                                                data-precio="{{$producto->precio_uni_prod}}"
                                                data-stock-min="{{$producto->stock_min_prod}}"
                                                data-stock="{{$producto->stock_actual_prod}}">
                                                Agregar
                                            </a>
                                                
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" id="cerrar_form" class="btn bg-danger text-white" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="productosBajos" type="button" class="btn btn-sm btn-success mb-2">Productos Bajo Stock</button>


                {{-- Agregar Productos --}}
                <table class="table table table-striped table-hover" id="miTabla">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock min</th>
                            <th>Stock actual</th>
                            <th>Cantidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input id="filas" class="filas d-none @error('filas') is-invalid @enderror" type="number" name="filas" value="">
                        @error('filas')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </tbody>
                    
                </table> 

                <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Requerimiento</button>
                <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>      
            </form>
           
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>  


    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

    {{-- FixedHeader --}}
    <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap4.css" rel="stylesheet">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    {{-- FixedHeader --}}
    <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    {{-- <script src="{{asset('js/table.js')}}"></script> --}}
    
    <script>
        
    $(document).ready(function(){
            $('#tabla-productos thead tr').clone(true).addClass('filters').appendTo('#tabla-productos thead');

            var table = $('#tabla-productos').DataTable({
                responsive: true,
                paging: false,
                destroy: true,
                deferRender: true,
                bLengthChange: true,
                select: false,
                searching: true,
                orderCellsTop: true,
                fixedHeader: true,
                // pageLength: 5,
                // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                language: {
                    // ... (tus opciones de idioma)
                },

                
                initComplete: function () {
                    var api = this.api();
                    // For each column
                    api.columns().eq(0).each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                        var title = $(cell).text();
                        $(cell).html('<input class="form-control" type="text" placeholder="' + title + '" />');
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('keyup change', function (e) {
                                e.stopPropagation();
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})';
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
                                    .draw();
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });

                    // new $.fn.dataTable.FixedHeader(table);
                    
                }
                
                
            });
                    
            
            $('.agregarProductos').click(function(){
                const id  = $(this).data('id');
                const codigo = $(this).data('codigo');
                const nombre = $(this).data('nombre');
                const categoria = $(this).data('categoria');
                const precio = $(this).data('precio');
                const stock_min = $(this).data('stock-min')
                const stock = $(this).data('stock');
                

                let tabla = document.getElementById("miTabla");
                let row = tabla.insertRow(tabla.rows.length);

                // console.log(tabla.rows.length)

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6)
                var cell8 = row.insertCell(7);
                var cell9 = row.insertCell(8);
            

                let uniqueStockId = 'stock_' + (tabla.rows.length - 1);
                // id="' + uniqueStockId + '"
                console.log(uniqueStockId)
                // cell1.innerHTML = '<input type="number" class="form-control mb-1" name="codigo_prod" value="' + codigo + '" disabled>';
                cell1.innerHTML = codigo;
                // cell2.innerHTML = '<input type="text" class="form-control mb-1" name="nombre_prod" value="' + nombre + '" disabled>';
                cell2.innerHTML = nombre;
                // cell3.innerHTML = '<input type="text" class="form-control mb-1" name="categoria_prod" value="' + categoria + '" disabled>';
                cell3.innerHTML = categoria;
                // cell4.innerHTML = '<input type="number" class="form-control mb-1" name="precio_prod" value="' + precio + '" disabled>';
                cell4.innerHTML = precio;
                // cell5.innerHTML = '<input type="number" class="form-control mb-1" name="stock_min_prod" value="' + stock_min + '" disabled>';
                cell5.innerHTML = stock_min;
                // cell6.innerHTML = '<input type="number" class="form-control mb-1" name="stock_prod[]" value="' + stock + '" disabled>';
                cell6.innerHTML = stock;
                cell7.innerHTML = '<input type="number" class="form-control mb-1" id="' + uniqueStockId + '" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod')}}">';
                cell8.innerHTML = '<button type="button" id="eliminarFila" class="btn btn-sm btn-danger text-uppercase eliminarFila">Eliminar</button>';
                cell9.innerHTML = '<input type="hidden" name="producto_id[]" value="'+id+'">'
                
                let inputs = document.querySelector(".filas");
                inputs.value = tabla.rows.length-1;
                console.log( inputs.value)

                
            });
        
        
            $(document).on('click', '.eliminarFila', function() {
                var tabla = document.getElementById("miTabla");

                if (tabla.rows.length > 2) {
                    var row = this.closest("tr"); // "this" hace referencia al botón clickeado
                    row.parentNode.removeChild(row);

                    // Actualiza los IDs después de eliminar la fila
                    for (var i = 1; i < tabla.rows.length; i++) {
                        var uniqueStockId = 'stock_' + i;
                        tabla.rows[i].cells[6].firstElementChild.id = uniqueStockId;
                    }
                } else {
                    alert("Debe haber al menos una fila.");
                }
            });


            

            $(document).on('click', '#productosBajos', function(){
                let tabla = document.getElementById("miTabla");
                
                let inputs = document.querySelector(".filas");
                
                
                $.ajax({
                        url: `{{env('APP_URL')}}/panel/productos-bajos-stock`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log(response)
                            const productosList = response;
                            const tableBody = $('#miTabla tbody');
                        
                            $.each(productosList, function(index, producto) {
                                let uniqueStockId = 'stock_' + (tabla.rows.length);
                                inputs.value = tabla.rows.length;
                                console.log( inputs.value)
                            let row = `
                                <tr>
                                    <td>${producto.codigo_prod} </td>
                                    <td>${producto.nombre_prod} </td>
                                    <td>${producto.categoria.nombre_cat}</td>
                                    <td>${producto.precio_uni_prod} </td>
                                    <td>${producto.stock_min_prod} </td>
                                    <td>${producto.stock_actual_prod} </td>
                                    <td>
                                        <input type="number" class="form-control mb-1"  id="`+ uniqueStockId +`" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod')}}">
                                    </td>
                                    <td>
                                        <button type="button" id="eliminarFila" class="btn btn-sm btn-danger text-uppercase eliminarFila">Eliminar</button>
                                    </td> 
                                    <td>   
                                        <input type="hidden" name="producto_id[]" value="${producto.id}">
                                    </td>
                                </tr>
                            `;
                            tableBody.append(row);
                            });

                        },
                        error: function (error) { 
                            consola.log(error)
                        }
                });
            });

   

    });








        // function agregarFila() {
        //     var table = document.getElementById("miTabla");
        //     var row = table.insertRow(table.rows.length);

        //     var cell1 = row.insertCell(0);
        //     var cell2 = row.insertCell(1);
        //     var cell3 = row.insertCell(2);
        //     var cell4 = row.insertCell(3);

        //     // Clona el select y sus opciones
        //     var selectOriginal = document.getElementById("producto_id");
        //     var nuevoSelect = selectOriginal.cloneNode(true);
        //     cell1.appendChild(nuevoSelect);
        //     // Clona el select y sus opciones
        //     // Crea un ID único para el input de stock
        //     var uniqueStockId = 'stock_' + (table.rows.length - 1);
        //     cell2.innerHTML = '<input type="number" class="form-control mb-1" id="' + uniqueStockId + '" name="stock" value="{{old('stock')}}" disabled>'; // Añade el input de stock

        //     cell3.innerHTML = '<input type="number" class="form-control mb-1" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod')}}">';
        //     cell4.innerHTML = '<button type="button" class="btn btn-sm btn-danger text-uppercase" onclick="eliminarFila(this)">Eliminar</button>';
            
        //     let inputs = document.getElementById("filas");
        //     inputs.value = table.rows.length-1;

        //     console.log(inputs.value);

        // }


    

        // function obtenerStock(select) {
        //     var stock = select.options[select.selectedIndex].getAttribute('data-stock');
        //     document.getElementById('stock_').value = stock;
        // }

        // function obtenerStock(select) {
        //     var stock = select.options[select.selectedIndex].getAttribute('data-stock');
        //     var uniqueStockId = 'stock_' + select.parentNode.parentNode.rowIndex;
        //     document.getElementById(uniqueStockId).value = stock;
        //     }
    </script>
@endsection

