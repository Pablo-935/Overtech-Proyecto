window.addEventListener("DOMContentLoaded", function() {


    let fechaActual = new Date();
    
    let anio = fechaActual.getFullYear();
    let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); 
    let dia = fechaActual.getDate().toString().padStart(2, '0'); 
    
    let fechaFormateada = anio + '-' + mes + '-' + dia;
    
        
    let fecha_caja = document.getElementById("fecha_hs_aper_caja").value = fechaFormateada;
    
    let saldo_inicial = document.getElementById("saldo_inicial");
    let saldo_total = document.getElementById("saldo_total");

      // Hora apertura
  var campoHora = document.getElementById('hs_aper_caja');
  var horaActual = new Date();
  var horas = horaActual.getHours().toString().padStart(2, '0');
  var minutos = horaActual.getMinutes().toString().padStart(2, '0');
  var horaFormateada = horas + ':' + minutos;
  campoHora.value = horaFormateada;

  

    let calcular = function () {
        saldo_total.value = saldo_inicial.value;
    }

    saldo_inicial.addEventListener("keyup", calcular )

    
    });
    