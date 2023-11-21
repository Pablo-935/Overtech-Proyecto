window.addEventListener("DOMContentLoaded", function() {


    let fechaActual = new Date();
    
    let anio = fechaActual.getFullYear();
    let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); // Agregamos 1 y formateamos el mes con dos dígitos
    let dia = fechaActual.getDate().toString().padStart(2, '0'); // Formateamos el día con dos dígitos
    
    let fechaFormateada = anio + '-' + mes + '-' + dia;
    
        
    let fecha_caja = document.getElementById("fecha_hs_aper_caja").value = fechaFormateada;
    
    let saldo_inicial = document.getElementById("saldo_inicial");
    let saldo_total = document.getElementById("saldo_total");


    let calcular = function () {
        saldo_total.value = saldo_inicial.value;
    }

    saldo_inicial.addEventListener("keyup", calcular )

    
    });
    