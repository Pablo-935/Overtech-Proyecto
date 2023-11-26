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
            <img src="{{public_path('logo/logo4.png')}}" alt=""  style="height: 90px; width: auto;  margin-right: 10px; text-align:center; float: right;">
            
            
            <div class="card-body">
               
                <div class="row" style="margin-bottom: 20px;">
                    <p> Solicitud de Requerimiento de Productos</p>
                    <div>
                        Fecha de Emisión: {{ $requerimiento->fecha_requer_comp}}
                    </div>
                </div>

                <table class="table table-sm table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th>Código de Producto</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requerimiento->DetalleRequerCompra as $detalle)
                        <tr>
                            <td>{{$detalle->producto->codigo_prod }}</td>
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