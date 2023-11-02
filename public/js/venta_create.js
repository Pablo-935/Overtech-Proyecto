$('#producto_id').select2(
    {
    tags: true,       
    multiple: true,  
    maximumSelectionLength: 1,
    width: 'resolve',
    placeholder: "Seleccione los productos"
}
);




window.addEventListener("DOMContentLoaded", function() {

$('#producto_id').val(null).trigger('change');

    

    

let fechaActual = new Date();

let anio = fechaActual.getFullYear();
let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); // Agregamos 1 y formateamos el mes con dos dígitos
let dia = fechaActual.getDate().toString().padStart(2, '0'); // Formateamos el día con dos dígitos

let fechaFormateada = anio + '-' + mes + '-' + dia;


let hora = fechaActual.getHours().toString().padStart(2, '0'); // Formateamos la hora con dos dígitos
let minuto = fechaActual.getMinutes().toString().padStart(2, '0'); // Formateamos el minuto con dos dígitos

let horaFormateada = hora + ':' + minuto;

console.log(fechaFormateada);

console.log(horaFormateada);

let hora_venta = document.getElementById("hora_venta").value = horaFormateada;
let fecha_venta = document.getElementById("fecha_venta").value = fechaFormateada;


//carga dinamica

let contar = 0;

// Función para calcular y actualizar el total
function actualizarTotal() {
    let total = 0;

    // Iterar sobre las filas de la tabla
    $('#tablaProductos tbody tr').each(function() {
        let cantidad = parseInt($(this).find('.cantidad').val());
        let precio = parseFloat($(this).find('.precio').val());

        total += cantidad * precio;

        console.log(cantidad);
        console.log(precio);

    });

    // Actualizar el input total_venta
    $('#total_venta').val(total.toFixed(2)); // Asegura que se muestren 2 decimales
}

$('#seleccionar').click(function() {
    var selectedOptions = $('#producto_id option:selected');
    var tablaProductos = $('#tablaProductos tbody');

    selectedOptions.each(function() {
        var productoId = $(this).val();
        var productoNombre = $(this).text();
        var productoStock = $(this).data('stock');
        var productoCodigo = $(this).data('codigo');
        var productoPrecio = $(this).data('precio');

        var newRow = '<tr>' +
            '<td>' + productoCodigo + '</td>' +
            '<input type="hidden" class="form-control codigo" data-codigo="' + productoCodigo + '" value="' + productoCodigo + '">' +

            '<td>' + productoNombre + '</td>' +
            '<input type="hidden" class="form-control nombre" data-nombre="' + productoNombre + '" value="' + productoNombre + '">' +

            ' <td> <input type="number" class="form-control cantidad" name="cantidad_prod_venta" value="1"></td>' +

            '<td>' + productoPrecio + '</td>' +
            '<input type="hidden" name="sub_total_det_venta" class="form-control precio" data-precio="' + productoPrecio + '" value="' + productoPrecio + '">' +

            '<td>' + productoStock + '</td>' +
            '<input type="hidden" class="form-control stock" data-stock="' + productoStock + '" value="' + productoStock + '">' +

            '<td><button type="button" class="btn btn-danger eliminar-fila">Eliminar</button></td>' +
            '</tr>';

        tablaProductos.append(newRow);

        contar = contar + 1;
        console.log(contar);

        // Actualizar el total al agregar una fila
        actualizarTotal();
    });
});

// Manejar la eliminación de filas
$('#tablaProductos').on('click', '.eliminar-fila', function() {
    $(this).closest('tr').remove();

    contar = contar - 1;
    console.log(contar);

    // Actualizar el total al eliminar una fila
    actualizarTotal();
});

// Actualizar el total al cambiar la cantidad en cualquier fila
$('#tablaProductos').on('input', '.cantidad', function() {
    actualizarTotal();
});



});
