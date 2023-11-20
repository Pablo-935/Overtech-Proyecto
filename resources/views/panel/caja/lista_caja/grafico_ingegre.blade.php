@extends('adminlte::page')

@section('title', 'Gráfico Ingresos y Egresos')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Gráfico de Ingresos y Egresos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="dateForm">
                            <div class="form-group">
                                <label for="startDate">Fecha de inicio:</label>
                                <input type="date" class="form-control" id="startDate" name="fecha_inicio" value="2023-11-01">
                            </div>
                            <div class="form-group">
                                <label for="endDate">Fecha de fin:</label>
                                <input type="date" class="form-control" id="endDate" name="fecha_fin">
                            </div>
                            <button type="submit" class="btn btn-primary">Generar Gráfico</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
$(function() {
    const lineChart = document.getElementById('lineChart').getContext('2d');

    // Capturar el envío del formulario y realizar petición AJAX similar al gráfico de ventas
    $('#dateForm').submit(function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();

        // Petición AJAX para obtener los datos de ingresos y egresos
        $.get("{{ route('grafico-ingegre') }}", { fecha_inicio: startDate, fecha_fin: endDate }, function(response) {
            response = JSON.parse(response);

            if(response.success) {
                let labels = response.data[0];
                let ingresos = response.data[1];
                let egresos = response.data[2];

                // Configuración del gráfico de ingresos y egresos (LineChart)
                const configChart = {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Ingresos',
                                data: ingresos,
                                borderColor: 'rgb(75, 192, 192)',
                                borderWidth: 1,
                                fill: false
                            },
                            {
                                label: 'Egresos',
                                data: egresos,
                                borderColor: 'rgb(255, 99, 132)',
                                borderWidth: 1,
                                fill: false
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                suggestedMin: 0,
                                precision: 0
                            }
                        }
                    }
                };

                // Crear el gráfico utilizando Chart.js
                new Chart(lineChart, configChart);

            } else {
                console.log(response.message);
            }
        })
        .fail(function(error) {
            console.log(error.statusText, error.status);
        });
    });
});

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
          var fechaActual = new Date().toISOString().split('T')[0];

      document.getElementById('endDate').value = fechaActual;
    });
</script>
@stop
