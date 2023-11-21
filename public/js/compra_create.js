$('#producto_id').select2(
    {  
        language: 'es',
        maximumSelectionLength: 1,
        placeholder: "Seleccione los productos"
}
);



$('#proveedores').select2(
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

let hora_compra = document.getElementById("hora_compra").value = horaFormateada;
let fecha_compra = document.getElementById("fecha_compra").value = fechaFormateada;

let contadorInp = document.getElementById("contador");
let contador = 0;

// Verificar el estado de caja
var estadoCaja = $("#caja_id option:selected").data("estado");

if (estadoCaja === 'Si') {
    $('#venta_guardar').prop('disabled', false);
    $('#mensaje2').addClass('d-none');
} else {
    $('#venta_guardar').prop('disabled', true);
    $('#venta_guardar').addClass('d-none');
    $('#mensaje2').text('La caja está Cerrada');
    $('#mensaje2').removeClass('d-none');
}


 


const tablaCompras = document.getElementById("tabla_compras");
const agregarCompraBtn = document.getElementById("agregarCompraBtn");

agregarCompraBtn.addEventListener("click", agregarFila);

function agregarFila() {
    contador = contador + 1
    contadorInp.value = contador;
    const nuevaFila = tablaCompras.insertRow();
    nuevaFila.innerHTML = `
        <td><textarea name="detalle[]"></textarea></td>
        <td><input type="number" name="requerimiento_compra_id[]" value="0"></td>
        <td><input type="number" name="monto_comp[]"></td>
        <td><a href="#" class="btn btn-danger" onclick="eliminarFila(this)">Eliminar</a></td>
    `;
}

window.eliminarFila = function (enlaceEliminar) {
    contador = contador - 1
    contadorInp.value = contador;
    const fila = enlaceEliminar.closest("tr");
    fila.parentNode.removeChild(fila);
};

});