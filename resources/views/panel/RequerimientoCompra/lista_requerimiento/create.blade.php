@extends('adminlte::page')

@section('title', 'Hacer Requerimiento')
@section('plugins.Select2', true)

@section('content')

    <div class="card m-3">
        <div class="card-header bg-primary text">Nuevo Requerimiento</div>
        <div class="card-body">
            <form action="{{route('requerimiento.store')}}" method="POST" novalidate>
                    @csrf 

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fecha Requerimiento</span>
                                <input type="date" class="form-control" name="fecha_requer_comp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old('fecha_requer_comp')}}">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                <input type="text" class="form-control" name="estado_requer_comp" value="{{old('estado_requer_comp')}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Empleado</span>
                                <select id="empleado_id" name="empleado_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}"> 
                                            {{ $empleado->nombre_empl }}
                                        </option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                    </div>
                    
                <h5 class="card-title">Detalle Requerimiento</h5>
                
                <table class="table table table-striped table-hover" id="miTabla">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Stock</th>
                            <th>Cantidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input id="filas" class="d-none" type="number" name="filas" value="1">
                            <td>
                                <select id="producto_id" name="producto_id[]" class="form-control mb-1"  onchange="obtenerStock(this)">
                                    <option value="">Seleccionar</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}" data-stock="{{ $producto->stock_actual_prod }}"> 
                                            {{ $producto->nombre_prod }}
                                        </option>
                                    @endforeach
                                </select>   
                            </td>
                            <td>
                                <input type="number" id="stock_1" class="form-control mb-1" name="stock" value="{{old('stock')}}" disabled>
                            </td>
                            <td>
                                <input type="number" class="form-control mb-1" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod')}}">
                            </td>
                            <td>
                                <button type="button" class="btn-sm btn-danger text-uppercase" onclick="eliminarFila(this)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        
                    </tbody>
                    
                </table> 

                <button type="button" class="btn btn-sm btn-warning" onclick="agregarFila()">Agregar Fila</button>
                <br>

                <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Requerimiento</button>
                <a class="btn btn-warning btn-sm mt-3" href="{{route('requerimiento.index')}}" role="button">Volver</a>      
            </form>
           
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>  
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

<script>

    function agregarFila() {
    var table = document.getElementById("miTabla");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);

    // Clona el select y sus opciones
    var selectOriginal = document.getElementById("producto_id");
    var nuevoSelect = selectOriginal.cloneNode(true);
    cell1.appendChild(nuevoSelect);
    // Clona el select y sus opciones
    // Crea un ID único para el input de stock
    var uniqueStockId = 'stock_' + (table.rows.length - 1);
    cell2.innerHTML = '<input type="number" class="form-control mb-1" id="' + uniqueStockId + '" name="stock" value="{{old('stock')}}" disabled>'; // Añade el input de stock

    cell3.innerHTML = '<input type="number" class="form-control mb-1" name="cantidad_requer_prod[]" value="{{old('cantidad_requer_prod')}}">';
    cell4.innerHTML = '<button type="button" class="btn btn-sm btn-danger text-uppercase" onclick="eliminarFila(this)">Eliminar</button>';
    
    let inputs = document.getElementById("filas");
    inputs.value = table.rows.length-1;

    console.log(inputs.value);

}





function eliminarFila(button) {
    var table = document.getElementById("miTabla");
    if (table.rows.length > 2) { // Verifica si hay más de una fila (la primera siempre se mantendrá)
        let row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // Actualiza los IDs de los campos de stock
        for (var i = 1; i < table.rows.length; i++) {
            var uniqueStockId = 'stock_' + i;
            table.rows[i].cells[1].firstElementChild.id = uniqueStockId;
        }
    } else {
        alert("Debe haber al menos una fila.");
    }
}

    // function obtenerStock(select) {
    //     var stock = select.options[select.selectedIndex].getAttribute('data-stock');
    //     document.getElementById('stock_').value = stock;
    // }

    function obtenerStock(select) {
    var stock = select.options[select.selectedIndex].getAttribute('data-stock');
    var uniqueStockId = 'stock_' + select.parentNode.parentNode.rowIndex;
    document.getElementById(uniqueStockId).value = stock;
}
</script>
@stop

