<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>

    <link rel="stylesheet" href="{{public_path('vendor/adminlte/dist/css/adminlte.min.css')}}">
    <style>
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <p class="card-title"> Requerimiento Nº: {{ $requerimiento->id}}</p>
            </div>
            <div class="card-body">
                <div class="row" style="display: flex;">
                    <div>
                        Fecha del Requerimiento: {{ $requerimiento->fecha_requer_comp}}
                    </div>
                    <div>
                        Estado: {{ $requerimiento->estado_requer_comp }}    
                    </div>
                    <div style="float: right">
                        Usuario: {{ $requerimiento->user->name }}  
                    </div>
                </div>

                <p class="text-center">Detalle de Requerimiento</p>

                <table class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th>Nº Detalle</th>
                            <th>Nº Requerimiento:</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requerimiento->DetalleRequerCompra as $detalle)
                        <tr>
                            <td>{{$detalle->id }}</td>
                            <td>{{$detalle->RequerimientoCompra->id }}</td>
                            <td>{{$detalle->producto->nombre_prod }}</td>
                            <td>{{$detalle->cantidad_requer_prod}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   


</body>
</html>