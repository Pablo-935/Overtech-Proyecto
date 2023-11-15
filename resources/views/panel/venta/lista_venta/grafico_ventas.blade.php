@extends('adminlte::page')

@section('title', 'Gráficos')

{{-- Activamos el plugin de Chartjs --}}
@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Datos Estadísticos de Ventas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- BAR CHART -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Gráfico de Ventas por Día</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(function() {
            const barChart = document.getElementById('barChart').getContext('2d');

            // Peticion AJAX para extraer datos de la BD y graficar
            $.get("{{ route('graficos-ventas') }}", function(response) {
                response = JSON.parse(response);

                // Si hay éxito en la petición
                if(response.success) {

                    let labels = response.data[0];
                    let counts = response.data[1];

                    // Convertir los valores a enteros
                    counts = counts.map(num => parseInt(num));

                    // Configuración del gráfico de ventas por día (BarChart)
                    const configChart = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Ventas por Día',
                            data: counts,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true, // Asegurar que el eje Y comience en cero
                                suggestedMin: 0, // Establecer el mínimo en cero
                                suggestedMax: Math.max(...counts) + 5, // Ajustar el máximo según el valor máximo de ventas + 5
                                precision: 0 // Eliminar decimales
                            }
                        }
                    }
                };

                    // Crear el gráfico utilizando Chart.js
                    new Chart(barChart, configChart);
                } else {
                    console.log(response.message);
                }
            })
            .fail(function(error) {
                console.log(error.statusText, error.status);
            });
        });
    </script>
@stop