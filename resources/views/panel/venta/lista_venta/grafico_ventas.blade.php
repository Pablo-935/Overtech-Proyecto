@extends('adminlte::page')

@section('title', 'Gráficos')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Grafico de cantidad de Ventas totales por dia</h1>
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
                            <label for="estadoVenta">Estado de Venta:</label>
                            <select class="form-control" id="estadoVenta" name="estado_venta">
                                <option value="">Todos</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Anulado">Anulado</option>
                                <option value="Facturado">Facturado</option>
                            </select><br>
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

    $('#dateForm').submit(function(event) {
        event.preventDefault();

        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();
        const estadoVenta = $('#estadoVenta').val();

        $.get("{{ route('graficos-ventas') }}", { fecha_inicio: startDate, fecha_fin: endDate, estado_venta: estadoVenta }, function(response) {

            if(response.success) {
                let labels = response.data[0];
                let counts = response.data[1];

                labels.unshift('');
                counts.unshift(0);

                const configChart = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Ventas por Día',
                            data: counts,
                            backgroundColor: 'rgb(46, 64, 83)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
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

                new Chart(barChart, configChart);

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