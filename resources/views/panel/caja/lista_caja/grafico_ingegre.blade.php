@extends('adminlte::page')

@section('title', 'Gráfico de Ingresos y Egresos')

@section('content_header')
    <h1>Gráfico de Ingresos y Egresos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="ingresosEgresosChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = @json($data);

    const ctx = document.getElementById('ingresosEgresosChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [''],
            datasets: data.datasets,
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0
                }
            }
        }
    });
</script>
@stop
