<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura B</title>

    <link rel="stylesheet" href="{{public_path('vendor/adminlte/dist/css/adminlte.min.css')}}">
    <style>
         body {
            text-align: center;
        }
    </style>
</head>
<body>

<img src="{{public_path('facs/facb.png')}}" class="text-center B" alt="" style="height: 50px; width: auto;  margin-right: 10px; text-align:center;">
                <p class="card-title"> Venta Nº: {{ $ventaB->id }}</p>
            <p style="float: right"><b>OVERTECH</b></p> 
            <br>                <br>



            <div class="card-body">
                
                <p style="float: left; text-align:initial">Fecha: {{ $ventaB->fecha_venta }} <br> Hora: {{ $ventaB->hora_venta }} <br></p> 
                <p style="float: right; text-align:end"> Cliente:  {{ $ventaB->cliente->nombre_cli }} <br> C.U.I.T:  {{ $ventaB->cliente->cuit_cli }}</p>
                <br>
                <br>
                <br>
                <br>

                <table class="table table-sm table-striped table-hover w-100">
                    <thead style="background-color: rgb(189, 189, 189)">
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventaB->DetalleVenta as $detalle)
                        @if($detalle->cantidad_prod_venta != 0)

                        <tr>
                            <td>{{$detalle->producto->codigo_prod }}</td>
                            <td>{{$detalle->producto->nombre_prod }}</td>
                            <td>{{$detalle->cantidad_prod_venta}}</td>
                            <td>{{number_format($detalle->sub_total_det_venta / $detalle->cantidad_prod_venta, 2, ',', '.') }}</td>
                            <td>{{ number_format($detalle->sub_total_det_venta, 2, ',', '.') }}</td>

                        </tr>

                        @endif
                        @endforeach

                    </tbody>
                </table>

                <br><br><br><br>
                <p style="float: left"> <b>Empleado:</b> {{ $ventaB->user->name }}</p> 

                <p style="float: right" class=""><b>TOTAL: &nbsp; </b>{{ number_format( $ventaB->total_venta, 2, ',', '.') }}</p>

            </div>
   


</body>
</html>