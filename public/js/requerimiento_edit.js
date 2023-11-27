$(document).ready(function(){

    let tabla = document.getElementById("miTabla");
    let inputs = document.getElementById("filas");
    inputs.value = tabla.rows.length-1;

    $('.eliminar').on('click', function(e){
        if (tabla.rows.length > 2) {
            const id = $(this).data('id');
            $.ajax({
                    url: `{{ env('APP_URL') }}/panel/detalleRequerimientos/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                        // id: id},
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                    
                    },
                    error: function (error) { 
                        consola.log('Error')
                }
            });
        } else {
            alert("Debe haber al menos una fila.");
        }
    });

    $(document).on('change', '.cantidad', function () {
        let cantidad = parseInt($(this).val());
        if (isNaN(cantidad) || cantidad < 1) {
            $(this).val(1);
        }
    });

});

