$('#clientes').select2(
  {  
     language: 'es',
      theme: "classic",
      placeholder: "Clientes"
}
);

window.addEventListener("DOMContentLoaded", function() {


  let estado = document.getElementById("estado");
  let facturar = document.getElementById("facturar");
  let anular_boton = document.getElementById("anular_boton");
  let cantidades2 = document.querySelectorAll('.cantidad2');
  let cantidades = document.querySelectorAll('.cantidad');
  let botonesEliminar = document.querySelectorAll('.eliminar-fila');
  let tipofac = this.document.getElementById("tipofac");
  let clientelis = this.document.getElementById("clientelis");
  let facb = this.document.getElementById("facb");
  let faca = this.document.getElementById("faca");
  let seleccionfac = this.document.getElementById("seleccionfac");
  let cancelar_boton = document.getElementById("cancelar_boton");
  let mensaje = document.getElementById("mensaje");


  
  clientelis
  facb
  if (estado.innerText == "Anulado") {
      estado.classList.add("badge", "bg-danger");
      anular_boton.classList.add("d-none");
      cancelar_boton.classList.add("d-none");
      facturar.classList.add("d-none");
      facb.classList.add("d-none");
      faca.classList.add("d-none");

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
          facb.classList.add("d-none");
          faca.classList.add("d-none");
          tipofac.classList.add("d-none");
          
      });
  }
  if (estado.innerText == "Facturado") {
      estado.classList.add("badge", "bg-success");
      facturar.classList.add("d-none");
      cancelar_boton.classList.add("d-none");
      cantidades.forEach(function(cantidad) {
      cantidad.classList.add("d-none");
      });
      botonesEliminar.forEach(function(botonEliminar) {
        botonEliminar.classList.add("d-none");
    });
  }

  if (estado.innerText == "Cancelado") {
    estado.classList.add("badge", "bg-warning");
    facturar.classList.add("d-none");
    anular_boton.classList.add("d-none");
    facb.classList.add("d-none");
    faca.classList.add("d-none");
    cancelar_boton.classList.add("d-none");

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



// evento de "Anular"
document.getElementById("anular_boton").addEventListener("click", function () {
    let anularRoute = this.getAttribute("data-anular-route");
    
    form.action = anularRoute;
});

// evento de "cancelar"

document.getElementById("cancelar_boton").addEventListener("click", function () {
  let cancelarRoute = this.getAttribute("data-cancelar-route");
  
  form.action = cancelarRoute;
});



function limitarRango(input) {
  var valor = parseInt(input.value, 10);

  // Si el valor no es un número o es menor que 1, establecer en 1
  if (isNaN(valor) || valor < 1) {
      input.value = 1;
  }

  // Si el valor es mayor que 100, establecer en 100
  if (valor > 100) {
      input.value = 100;
  }
}


let cambiar_factura = function () {
  if (seleccionfac.value == "B") {
    faca.classList.add("d-none")
    facb.classList.remove("d-none")

  }

  if (seleccionfac.value == "A") {
    faca.classList.remove("d-none")
    facb.classList.add("d-none")

  }
}

seleccionfac.addEventListener("click", cambiar_factura)




    // Función para limitar la entrada a un rango entre 0 y 100
    function limitarRango(input) {
        var valor = parseInt(input.value, 10);

        if (valor < 0 || isNaN(valor)) {
            input.value = 0;
        }

        if (valor > 100) {
            input.value = 100;
        }
    }

    
// Función para verificar el stock y mostrar alerta si la cantidad es mayor que el stock
function verificarStock(input) {
  var cantidad = parseInt(input.value, 10);
  var stock = parseInt($(input).closest('tr').find('td:eq(4)').text(), 10); // Obtener el valor del stock desde la columna correspondiente

  if (cantidad > stock) {
      $(input).addClass('border-danger');
      facturar.classList.add("d-none");
      mensaje.classList.remove("d-none")
      cancelar_boton.classList.add("d-none");


  } else {
      // Quitamos la clase border-danger al input
      $(input).removeClass('border-danger');
      facturar.classList.remove("d-none");
      mensaje.classList.add("d-none")
      cancelar_boton.classList.remove("d-none");

  }
}

    // Escuchar el evento keyup en los campos de cantidad
    $(document).on('keyup', '.cantidad', function() {
        limitarRango(this);
        verificarStock(this);
    });




});
