$('#producto_id').select2({
    tags: true,       
    multiple: true,  
    maximumSelectionLength: 1
});




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








});
