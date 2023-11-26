@extends('adminlte::page')

@section('title', 'Nueva Compra')

@section('content')




@if (session('alert1'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert1') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

        <div class="card m-3">
            <div class="card-header bg-primary text">Nueva Compra</div>
            <div class="card-body">
                <form id="form" action="{{route('compra.store')}}" method="POST" novalidate>
                    @csrf 

                        
                        <div class="row">

    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
                                    <input type="date" class="form-control @error('fecha_comp') is-invalid @enderror" id="fecha_compra" name="fecha_comp" value="{{old('fecha_compra')}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    @error('fecha_comp')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Hora</span>
                                    <input type="time" class="form-control" id="hora_compra" name="hora_comp" value="{{old('hora_compra')}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Estado Caja</span>
                                    <select id="caja_id" name="caja_id" class="form-control "  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        @php
                                            $cajaAbiertaEncontrada = false;
                                        @endphp
                                    
                                        @foreach ($cajas as $caja)
                                            @if ($caja->abierta_caja === 'Si' && !$cajaAbiertaEncontrada)
                                                <option value="{{ $caja->id }}" data-estado="{{ $caja->abierta_caja }}">Caja Abierta</option>
                                                @php
                                                    $cajaAbiertaEncontrada = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                    
                                        @if (!$cajaAbiertaEncontrada)
                                            <option value="NO">Caja Cerrada</option>
                                        @endif
                                    </select> 
                                    
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <select id="empleado_id" name="operador" class="form-control d-none"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    </select>     
                                </div>
                            </div>
                        </div>

                        <div class="row">    
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
                                    <select style="width: 350px; height: 40px;" id="proveedores" name="proveedor_id" class="form-control "  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}"> 
                                                {{ $proveedor->nombre_prov }}
                                            </option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Monto</span>
                                <input type="number" placeholder="$00,000,000" class="form-control @error('monto_comp') is-invalid @enderror" type="number" name="monto_comp" value="{{old('monto_comp')}}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                @error('monto_comp')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            
                            </div>
                            </div>
                            

                            
                        </div>

                            {{-- Modal --}}
                        <button type="button" id="nuevo_empleado" class="btn btn-sm btn-primary my-2" data-toggle="modal" data-target="#modal-nuevo-empleado">
                        Asignar Requerimiento
                        </button>

                        <div class="modal fade " id="modal-nuevo-empleado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                            <div id="modal" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body ">
                                        {{-- Tabla de Productos --}}
                                        <table id="tabla-productos" class="table table-sm table-striped table-hover w-100 " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-uppercase">Nº Requerimiento</th>
                                                    <th scope="col" class="text-uppercase">Fecha</th>
                                                    <th scope="col" class="text-uppercase">Estado</th>
                                                    <th scope="col" class="text-uppercase">Usuario</th>
                                                    <th scope="col" class="text-uppercase">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requerimientos as $requerimiento)
                                                <tr>
                                                    <td>{{ $requerimiento->id }}</td>
                                                    <td>{{ $requerimiento->fecha_requer_comp }}</td>
                                                    <td>{{ $requerimiento->estado_requer_comp }}</td>
                                                    <td>{{ $requerimiento->user->name}}</td>
                                                    {{-- <td ><img src="{{ $producto->imagen_prod }}" alt="{{ $producto->nombre_prod }}" class="img-fluid" style="width: 75px;"></td> --}}
                                                    <td class="text-center">
                                                        <a class="agregarProductos btn btn-sm btn-warning"
                                                        data-id= "{{$requerimiento->id}}">
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



                        <div class="datosRequerimiento">
                            
                        </div>
                        {{-- Agregar Productos --}}
                        <table class="table table table-striped table-hover" id="miTabla">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Precio Costo</th>
                                    <th>Precio Actual</th>
                                    <th>Stock actual</th>
                                    <th>Cantidad</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <input id="filas" class="filas d-none @error('filas') is-invalid @enderror" type="number" name="filas" value="">
                                @error('filas')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </tbody>
                            
                        </table> 
                        
                
                        <div class="form-group ">
                            <label for="Mensaje:" >Detalle:</label>
                            {{-- <div style="height: 100px" name="detalle" id="detalle" class="form-control"></div> --}}
                            <textarea name="detalle" id="body" cols="30" rows="5" class="form-control @error('detalle') is-invalid @enderror"></textarea>
                            @error('detalle')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-sm mt-3">Registrar Compra</button>
                        <a class="btn btn-warning btn-sm mt-3" href="{{route('compra.index')}}" role="button">Volver</a>      

                        
                </form>
                   
                </div>
            </div>
        </div>

@endsection




@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>  
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

    {{-- FixedHeader --}}
    <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap4.css" rel="stylesheet">

{{-- Tejada --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@stop

@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

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

   
    {{-- Tejada --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2-i18n@latest/dist/js/i18n/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script> --}}
    <script src="{{ asset('js/compra_create.js') }}"></script>

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
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "search": "_INPUT_",
                    "searchPlaceholder": "...",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
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
                    
            $(document).on('click', '.agregarProductos', function() {
                const id = $(this).data('id');
                let tabla = document.getElementById("miTabla");
                let inputs = document.querySelector(".filas");
                const tableBody = $('#miTabla tbody');
                const datosRequerimientoDiv = $('.datosRequerimiento');

                $.ajax({
                    url: `{{url('/panel/compra-requerimiento')}}/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        const requerimientoCompra = response.requerimiento;
                        const detalles = response.detalles;

                        // Limpiar la tabla antes de agregar nuevas filas
                        tableBody.empty();

                        datosRequerimientoDiv.empty();
                        // Agregar información del requerimiento a la div
                        let requerimientoInfo = `
                            <div class="row justify-content-between px-2 py-2">
                                <p class="h4" name="requerimiento_id">Nº Requerimiento: ${requerimientoCompra.id}</p>
                                <input type="hidden" class="h4 d-none" name="requerimiento_compra_id" value="${requerimientoCompra.id}"></input>
                                <p class="h4" name="estado_requer_comp">Estado: ${requerimientoCompra.estado_requer_comp}</p>
                           </div>
                        `;
                        datosRequerimientoDiv.append(requerimientoInfo);

                        // Recorrer los detalles y agregar filas a la tabla
                        $.each(detalles, function(index, detalle) {
                            let uniqueStockId = 'stock_' + (tabla.rows.length);
                            let uniquePrecio = 'precio_' + (tabla.rows.length);
                            inputs.value = tabla.rows.length;
                            let row = `
                                <tr>
                                    <td>${detalle.producto.codigo_prod}</td>
                                    <td>${detalle.producto.nombre_prod}</td>
                                    <td>${detalle.producto.precio_uni_prod}</td>
                                    <td>
                                        <input type="number" class="form-control mb-1"  id="`+ uniquePrecio +`" name="precio_uni_prod[]" value="${detalle.producto.precio_uni_prod}">
                                    </td>
                                    <td>${detalle.producto.stock_actual_prod}</td>
                                    <td>
                                        <input type="number" class="form-control mb-1 cantidad"  id="`+ uniqueStockId +`" name="cantidad_requer_prod[]" value="${detalle.cantidad_requer_prod}">
                                    </td>
                                
                                    <td>   
                                        <input type="hidden" name="producto_id[]" value="${detalle.producto_id}">
                                    </td>
                                    
                                    
                                </tr>
                            `;
                            tableBody.append(row);
                            $(document).on('change', '.cantidad', function () {
                                let cantidad = parseInt($(this).val());
                                if (isNaN(cantidad) || cantidad < 1) {
                                    $(this).val(1);
                                }
                        });
                           
            
                            
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

                $.validator.unobtrusive.parse('#form');
            });
    });








    </script>
@endsection 