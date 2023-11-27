   
    // $(document).ready(function(){

    //     let fechaActual = new Date();
    //     let anio = fechaActual.getFullYear();
    //     let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); 
    //     let dia = fechaActual.getDate().toString().padStart(2, '0'); 
    //     let fechaFormateada = anio + '-' + mes + '-' + dia;
    //     let fecha_compra = document.getElementById("fecha_requer_comp").value = fechaFormateada;


    //         $('#tabla-productos thead tr').clone(true).addClass('filters').appendTo('#tabla-productos thead');

    //         var table = $('#tabla-productos').DataTable({
    //             responsive: true,
    //             paging: false,
    //             destroy: true,
    //             deferRender: true,
    //             bLengthChange: true,
    //             select: false,
    //             searching: true,
    //             orderCellsTop: true,
    //             fixedHeader: true,
    //             // pageLength: 5,
    //             // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
    //             language: {
    //                 "sProcessing": "Procesando...",
    //                 "sLengthMenu": "Mostrar _MENU_ registros",
    //                 "sZeroRecords": "No se encontraron resultados",
    //                 "sEmptyTable": "Ningún dato disponible en esta tabla",
    //                 "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    //                 "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    //                 "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    //                 "sInfoPostFix": "",
    //                 "sSearch": "Buscar:",
    //                 "search": "_INPUT_",
    //                 "searchPlaceholder": "...",
    //                 "sUrl": "",
    //                 "sInfoThousands": ",",
    //                 "sLoadingRecords": "Cargando...",
    //                 "oPaginate": {
    //                     "sFirst": "Primero",
    //                     "sLast": "Último",
    //                     "sNext": "Siguiente",
    //                     "sPrevious": "Anterior"
    //                 },
    //                 "oAria": {
    //                     "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
    //                     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	// 	}
    //             },

                
    //             initComplete: function () {
    //                 var api = this.api();
    //                 // For each column
    //                 api.columns().eq(0).each(function (colIdx) {
    //                     // Set the header cell to contain the input element
    //                     var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
    //                     var title = $(cell).text();
    //                     $(cell).html('<input class="form-control" type="text" placeholder="' + title + '" />');
    //                     // On every keypress in this input
    //                     $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
    //                         .off('keyup change')
    //                         .on('keyup change', function (e) {
    //                             e.stopPropagation();
    //                             // Get the search value
    //                             $(this).attr('title', $(this).val());
    //                             var regexr = '({search})';
    //                             var cursorPosition = this.selectionStart;
    //                             // Search the column for that value
    //                             api
    //                                 .column(colIdx)
    //                                 .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
    //                                 .draw();
    //                             $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
    //                         });
    //                 });

                    
                    
    //             }
                
                
    //         });
                    
            
    //         $('.agregarProductos').click(function(){
    //             const id  = $(this).data('id');
    //             const codigo = $(this).data('codigo');
    //             const nombre = $(this).data('nombre');
    //             const categoria = $(this).data('categoria');
    //             const precio = $(this).data('precio');
    //             const stock_min = $(this).data('stock-min')
    //             const stock = $(this).data('stock');
                

    //             if (filaYaAgregada(id)) {
    //                 alert('Este producto ya ha sido agregado');
    //                 return;
    //             }

    //             let tabla = document.getElementById("miTabla");
    //             let row = tabla.insertRow(tabla.rows.length);

    //             // console.log(tabla.rows.length)

    //             var cell1 = row.insertCell(0);
    //             var cell2 = row.insertCell(1);
    //             var cell3 = row.insertCell(2);
    //             var cell4 = row.insertCell(3);
    //             var cell5 = row.insertCell(4);
    //             var cell6 = row.insertCell(5);
    //             var cell7 = row.insertCell(6)
    //             var cell8 = row.insertCell(7);
    //             var cell9 = row.insertCell(8);
            

    //             let uniqueStockId = 'stock_' + (tabla.rows.length - 1);
    //             // id="' + uniqueStockId + '"
    //             console.log(uniqueStockId)
    //             // cell1.innerHTML = '<input type="number" class="form-control mb-1" name="codigo_prod" value="' + codigo + '" disabled>';
    //             cell1.innerHTML = codigo;
    //             // cell2.innerHTML = '<input type="text" class="form-control mb-1" name="nombre_prod" value="' + nombre + '" disabled>';
    //             cell2.innerHTML = nombre;
    //             // cell3.innerHTML = '<input type="text" class="form-control mb-1" name="categoria_prod" value="' + categoria + '" disabled>';
    //             cell3.innerHTML = categoria;
    //             // cell4.innerHTML = '<input type="number" class="form-control mb-1" name="precio_prod" value="' + precio + '" disabled>';
    //             cell4.innerHTML = precio;
    //             // cell5.innerHTML = '<input type="number" class="form-control mb-1" name="stock_min_prod" value="' + stock_min + '" disabled>';
    //             cell5.innerHTML = stock_min;
    //             // cell6.innerHTML = '<input type="number" class="form-control mb-1" name="stock_prod[]" value="' + stock + '" disabled>';
    //             cell6.innerHTML = stock;
    //             cell7.innerHTML = '<input type="number" class="form-control mb-1" id="' + uniqueStockId + '" name="cantidad_requer_prod[]" value="1">';
    //             cell7.querySelector('input').addEventListener('change', function() {
    //                 let valor = parseInt($(this).val());
    //                 if (isNaN(valor) || valor < 1) {
    //                     $(this).val(1);
    //                 }
    //             });
    //             cell8.innerHTML = '<button type="button" id="eliminarFila" class="btn btn-sm btn-danger text-uppercase eliminarFila">Eliminar</button>';
    //             cell9.innerHTML = '<input type="hidden" name="producto_id[]" value="'+id+'">'
                
    //             let inputs = document.querySelector(".filas");
    //             inputs.value = tabla.rows.length-1;
    //             console.log( inputs.value)

                
    //         });

    //         function filaYaAgregada(id) {
    //             let tabla = document.getElementById("miTabla");
    //             for (let i = 1; i < tabla.rows.length; i++) { 
    //                 let fila = tabla.rows[i];
    //                 let idFila = fila.querySelector('[name="producto_id[]"]').value;
    //                 if (idFila == id) {
    //                     return true; 
    //                 }
    //             }
    //             return false; 
    //         }
        
        
    //         $(document).on('click', '.eliminarFila', function() {
    //             var tabla = document.getElementById("miTabla");
    //             let inputs = document.querySelector(".filas");

    //             if (tabla.rows.length > 2) {
    //                 var row = this.closest("tr"); // "this" hace referencia al botón clickeado
    //                 row.parentNode.removeChild(row);

    //                 // Actualiza los IDs después de eliminar la fila
    //                 for (var i = 1; i < tabla.rows.length; i++) {
    //                     var uniqueStockId = 'stock_' + i;
    //                     tabla.rows[i].cells[6].firstElementChild.id = uniqueStockId;
    //                     inputs.value = tabla.rows.length - 1;                        
    //                 }
    //             } else {
    //                 alert("Debe haber al menos una fila.");
    //             }
    //         });


            

    //         $(document).on('click', '#productosBajos', function(){
    //             let tabla = document.getElementById("miTabla");
                
    //             let inputs = document.querySelector(".filas");
                
                
    //             $.ajax({
    //                     url: `{{env('APP_URL')}}/panel/productos-bajos-stock`,
    //                     type: 'GET',
    //                     dataType: 'json',
    //                     success: function(response) {
    //                         console.log(response)
    //                         const productosList = response;
    //                         const tableBody = $('#miTabla tbody');
                        
    //                         $.each(productosList, function(index, producto) {
    //                             let uniqueStockId = 'stock_' + (tabla.rows.length);
    //                             inputs.value = tabla.rows.length;
    //                             console.log( inputs.value)
    //                         let row = `
    //                             <tr>
    //                                 <td>${producto.codigo_prod} </td>
    //                                 <td>${producto.nombre_prod} </td>
    //                                 <td>${producto.categoria.nombre_cat}</td>
    //                                 <td>${producto.precio_uni_prod} </td>
    //                                 <td>${producto.stock_min_prod} </td>
    //                                 <td>${producto.stock_actual_prod} </td>
    //                                 <td>
    //                                     <input type="number" class="form-control mb-1 cantidad"  id="`+ uniqueStockId +`" name="cantidad_requer_prod[]" value="1">
    //                                 </td>
    //                                 <td>
    //                                     <button type="button" id="eliminarFila" class="btn btn-sm btn-danger text-uppercase eliminarFila">Eliminar</button>
    //                                 </td> 
    //                                 <td>   
    //                                     <input type="hidden" name="producto_id[]" value="${producto.id}">
    //                                 </td>
    //                             </tr>
    //                         `;
    //                         tableBody.append(row);

    //                         $(document).on('change', '.cantidad', function () {
    //                                 let cantidad = parseInt($(this).val());
    //                                 if (isNaN(cantidad) || cantidad < 1) {
    //                                     $(this).val(1);
    //                                 }
    //                         });
    //                         });

    //                     },
    //                     error: function (error) { 
    //                         consola.log(error)
    //                     }
    //             });
    //         });



    // });
