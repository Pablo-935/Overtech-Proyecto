    window.addEventListener("DOMContentLoaded", function() {

        let estado = document.getElementById("estado");
        if (estado.innerText  == "Cancelado") {
            estado.classList.add("badge", "bg-danger");
        }
        if (estado.innerText  == "Pendiente") {
            estado.classList.add("badge", "bg-warning");
        }
        if (estado.innerText  == "Facturado") {
            estado.classList.add("badge", "bg-success");
        }


    });
