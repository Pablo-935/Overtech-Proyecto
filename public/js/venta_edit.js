// $('#clientes').select2(
//   {  
//       language: 'es',
//       theme: "classic",
//       placeholder: "Clientes"
// }
// );

window.addEventListener("DOMContentLoaded", function() {


  let estado = document.getElementById("estado");
  let facturar = document.getElementById("facturar");
  let anular_boton = document.getElementById("anular_boton");
  let cantidades2 = document.querySelectorAll('.cantidad2');
  let cantidades = document.querySelectorAll('.cantidad');
  let botonesEliminar = document.querySelectorAll('.eliminar-fila');

  if (estado.innerText == "Anulado") {
      estado.classList.add("badge", "bg-danger");
      anular_boton.classList.add("d-none");
      facturar.classList.add("d-none");

      cantidades.forEach(function(cantidad) {
          cantidad.classList.add("d-none");
      });
      botonesEliminar.forEach(function(botonEliminar) {
          botonEliminar.classList.add("d-none");
      });
  }
  if (estado.innerText == "Pendiente") {
      estado.classList.add("badge", "bg-warning");
      anular_boton.classList.add("d-none");
      cantidades2.forEach(function(cantidad2) {
          cantidad2.classList.add("d-none");
      });
  }
  if (estado.innerText == "Facturado") {
      estado.classList.add("badge", "bg-success");
      facturar.classList.add("d-none");
      cantidades.forEach(function(cantidad) {
          cantidad.classList.add("d-none");
      });
      botonesEliminar.forEach(function(botonEliminar) {
        botonEliminar.classList.add("d-none");
    });
  }
    // actualizar los cálculos cuando cambia la cantidad
    function actualizarCalculos(fila) {
        let cantidadInput = fila.querySelector('input[name="cantidad_prod_venta[]"]');
        let subTotalCelda = fila.querySelector('td[name="sub_total"]');
        let subTotalInput = fila.querySelector('input[name="sub_total_det_venta[]"]');
        let precioUnitarioCelda = fila.querySelector('.precio-unitario');
    
        let cantidad = parseFloat(cantidadInput.value.replace(/,/g, ''));
        let precioUnitarioInicial = parseFloat(precioUnitarioCelda.textContent.replace(/,/g, ''));
    
        let subTotal = cantidad * precioUnitarioInicial;
    
        subTotalCelda.textContent = subTotal.toLocaleString('es-US', { minimumFractionDigits: 2 });
    
        subTotalInput.value = subTotal.toLocaleString('en-US', { minimumFractionDigits: 2 }).replace(/,/g, '');
    
        actualizarTotal();
      }
    
      // actualizar el total
      function actualizarTotal() {
        let filas = document.querySelectorAll("table tbody tr");
    
        let total = 0;
    
        // Iterar sobre cada fila y sumar los subtotales
        filas.forEach(function (fila) {
          let subTotalInput = fila.querySelector('input[name="sub_total_det_venta[]"]');
          total += parseFloat(subTotalInput.value.replace(/,/g, '')) || 0;
        });
    
        let totalElement = document.querySelector("h1[name='total'] b");
        totalElement.textContent = total.toLocaleString('es-US', { minimumFractionDigits: 2 });
        document.getElementById("total_venta").value = total;
      }
    
      let filas = document.querySelectorAll("table tbody tr");
    
      // Iterar sobre cada fila
      filas.forEach(function (fila) {
        // Obtener elementos relevantes dentro de la fila
        let cantidadInput = fila.querySelector('input[name="cantidad_prod_venta[]"]');
        let precioUnitarioCelda = fila.querySelector('.precio-unitario');
    
        cantidadInput.addEventListener("keyup", function () {
          actualizarCalculos(fila);
        });

        let cantidadInicial = parseFloat(cantidadInput.value.replace(/,/g, ''));
        let subTotalInicial = parseFloat(fila.querySelector('input[name="sub_total_det_venta[]"]').value.replace(/,/g, ''));
    
        let precioUnitarioInicial = cantidadInicial !== 0 ? subTotalInicial / cantidadInicial : 0;
    
        precioUnitarioCelda.textContent = precioUnitarioInicial.toLocaleString('es-US', { minimumFractionDigits: 2 });
      });
    
      actualizarTotal();





      let mitabla = document.getElementById("mitabla");
      let contador = document.getElementById("contador");

      contador.value = mitabla.rows.length - 1;

// Obtén referencias a elementos relevantes
let form = document.getElementById("form");

// Agrega un evento de clic al botón "Anular"
document.getElementById("anular_boton").addEventListener("click", function () {
    // Obtén la ruta de anulación desde el atributo de datos
    let anularRoute = this.getAttribute("data-anular-route");
    
    // Cambia la acción del formulario para Anular
    form.action = anularRoute;
});




// ======ELIMINAR FILA Y SETEAR VALOR EN 0 =================


$('.eliminar-fila').click(function () {
  var fila = $(this).closest('tr');

  let cantidadInput = fila.find('input[name^="cantidad_prod_venta"]');
  cantidadInput.val(0);

  actualizarCalculos(fila[0]); 

  actualizarTotal();

  fila.hide();
});
//




});
