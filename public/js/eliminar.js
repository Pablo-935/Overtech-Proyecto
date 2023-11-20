document.addEventListener('DOMContentLoaded', function(event){
    let boton = document.getElementById('eliminar');
    let formulario = document.getElementById('eliminar_detalle');

    let enviar = function () {
        console.log('hola');
    }

    boton.addEventListener('click', function(e) {
        e.preventDefault(); // Previene el comportamiento predeterminado del botón
        enviar(); // Llama a la función 'enviar'
    });
});