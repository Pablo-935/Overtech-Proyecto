@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Categorías')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Empleados</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')

@stop

@section('js')
<script>
    console.log('hola')
    $(document).ready(function () {
        let url = `{{ env('APP_URL') }}/panel/empleados/all`
        console.log(url)
        // let route = "{{route('empleados.all')}}"
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                console.log('data', data)
                // 'data' contiene la lista de empleados como un array de objetos

                // Puedes procesar los datos como necesites en tu vista aquí
                // data.forEach(function(empleado){
                //     console.log(empleado.nombre_empl);
                // });
            },
            error: function (err) {
                console.log('err', err)
            }
        });

    });

</script>
@endsection
