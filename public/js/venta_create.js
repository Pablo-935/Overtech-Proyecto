$('#producto_id').select2(
    {  
        language: 'es',
        maximumSelectionLength: 1,
        placeholder: "Seleccione los productos"
}
);



$('#clientes').select2(
    {  
        language: 'es',
        theme: "classic",
        placeholder: "Clientes"
}
);



window.addEventListener("DOMContentLoaded", function() {

$('#producto_id').val(null).trigger('change');


let fechaActual = new Date();

let anio = fechaActual.getFullYear();
let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); 
let dia = fechaActual.getDate().toString().padStart(2, '0'); 

let fechaFormateada = anio + '-' + mes + '-' + dia;


let hora = fechaActual.getHours().toString().padStart(2, '0'); 
let minuto = fechaActual.getMinutes().toString().padStart(2, '0'); 

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
    let stockSuperado = false;

    // Iterar sobre las filas de la tabla
    $('#tablaProductos tbody tr').each(function() {
        let cantidadInput = $(this).find('.cantidad');
        let cantidad = parseInt(cantidadInput.val());

        if (isNaN(cantidad) || cantidad < 1) {
            cantidadInput.val(1);
            cantidad = 1;
        }

        let precio = parseFloat($(this).find('.precio').val());
        var productoStock = $(this).find('.stock').data('stock');
        let subTotal = cantidad * precio;

        if (cantidad > productoStock) {
            console.log("mayor");
            stockSuperado = true;
            $(this).find('.cantidad').addClass('border border-danger');
        } else {
            $(this).find('.cantidad').removeClass('border border-danger');
        }

        total += subTotal;

        // Actualizar el input sub_total solo en la fila actual
        $(this).find('.sub_total').val(subTotal.toFixed(2));
        $(this).find('.sub_total_ver').text(subTotal.toLocaleString("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

    });

    // Actualizar el input total_venta
    $('#total_venta').val(total.toFixed(2));
    document.querySelector(".total_ver").textContent ='TOTAL: ' + total.toLocaleString("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Actualizar el botón de guardar y el mensaje de error
    if (stockSuperado) {
        $('#venta_guardar').prop('disabled', true);
        $('#mensaje').text('Cantidad de existencias insuficientes ');
        $('#mensaje').removeClass('d-none');
    } else {
        $('#venta_guardar').prop('disabled', false);
        $('#mensaje').addClass('d-none');
    }
}



//cargar datos en tabla de forma dinamica

$('#seleccionar').click(function() {
    var selectedOptions = $('#producto_id option:selected');
    var tablaProductos = $('#tablaProductos tbody');

    var valor_dolar = parseFloat(document.getElementById('valor_dolar').value);
    var valor_venta = parseFloat(document.getElementById('valor_venta').value);

    selectedOptions.each(function() {
        var productoId = $(this).val();
        var productoNombre = $(this).text();
        var productoid = $(this).data('id');
        var productoStock = $(this).data('stock');
        var productoCodigo = $(this).data('codigo');
        var productoPrecio = parseFloat($(this).data('precio')) 

        var producto_calculo = (((productoPrecio * valor_venta) / 100) + productoPrecio) * valor_dolar;
        var productoPrecioFormatted = parseFloat(producto_calculo).toLocaleString('es-US', { minimumFractionDigits: 2 });



        var newRow = '<tr>' +
            '<td>' + productoCodigo + '</td>' +
            '<input type="hidden" class="form-control codigo" data-codigo="' + productoCodigo + '" value="' + productoCodigo + '">' +
            '<input type="hidden" name="id_producto[]" class="form-control codigo" data-id="' + productoid + '" value="' + productoid + '">' +

            '<td>' + productoNombre + '</td>' +
            '<input type="hidden" class="form-control nombre" data-nombre="' + productoNombre + '" value="' + productoNombre + '">' +

            ' <td> <input type="number" class="form-control cantidad" id="cantidad_prod_venta" name="cantidad_prod_venta[]" value="1"></td>' +


            '<td>' + productoPrecioFormatted + '</td>' +
            '<input type="hidden" name="sub_total_det_venta" class="form-control precio" data-precio="' + producto_calculo + '" value="' + producto_calculo + '">' +

            '<td>' + productoStock + '</td>' +
            '<input type="hidden" class="form-control stock" data-stock="' + productoStock + '" value="' + productoStock + '">' +

            '<td><p class="sub_total_ver"></p></td>' +
            ' <input type="hidden" class="form-control sub_total" name="sub_total[]" value="' + productoPrecio + '">' +

            '<td><button type="button" class="btn btn-danger eliminar-fila">Eliminar</button></td>' +
            '</tr>';

        tablaProductos.append(newRow);

        contar = contar + 1;
        console.log(contar);

        document.getElementById("contador").value = contar

        // Actualizar el total al agregar una fila
        actualizarTotal();
    });

    $(".cantidad").last().TouchSpin({
        verticalbuttons: true,
        min: 1,
        max: 100,
        step: 1.0,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 10,
    }).on('change', function() {
        // Llama a la función para actualizar el total cuando cambia la cantidad
        actualizarTotal();
    });
});

// Manejar la eliminación de filas
$('#tablaProductos').on('click', '.eliminar-fila', function() {
    $(this).closest('tr').remove();

    contar = contar - 1;
    console.log(contar);
    document.getElementById("contador").value = contar
    // Actualizar el total al eliminar una fila
    actualizarTotal();
});

// Actualizar el total al cambiar la cantidad en cualquier fila
$('#tablaProductos').on('input', '.cantidad', function() {
    actualizarTotal();
});


var estadoCaja = $("#caja_id option:selected").data("estado");

// Verificar el estado de caja
if (estadoCaja === 'Si') {
    $('#venta_guardar').prop('disabled', false);
    $('#mensaje2').addClass('d-none');
} else {
    $('#venta_guardar').prop('disabled', true);
    $('#venta_guardar').addClass('d-none');
    $('#mensaje2').text('La caja está Cerrada');
    $('#mensaje2').removeClass('d-none');
}






// // Validar DNI
// let form = document.getElementById("form");
// let dni_venta = document.getElementById("dni_venta");

// console.log("Script cargado");

// form.addEventListener("submit", e => {
//     e.preventDefault();

//     console.log("Formulario enviado");

//     if (dni_venta.value.trim() === "") {
//         console.log("DNI vacío. Mostrar alerta.");
//         alert("Por favor ingrese un DNI válido");
//     } else {
//         console.log("DNI válido. Enviar formulario.");
//         // Deshabilitar el botón de envío para evitar el envío múltiple
//         document.getElementById("venta_guardar").disabled = true;
//         // Aquí puedes realizar otras acciones si el DNI no está vacío
//         console.log("Acciones adicionales después de la validación");
//         form.submit();
//     }
// });




});
