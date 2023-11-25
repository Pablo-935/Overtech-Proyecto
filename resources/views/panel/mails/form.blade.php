@extends('adminlte::page')

@section('title', 'Inicio')
    

@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')



    @if (session('alert'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('alert')}}
                <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif


    <div class="card ms-5 me-5 mt-3 ">
            <div class="card-header bg-primary text">Notificacion a Administrador</div>

        <div class="card-body">


            <div class="row  justify-content-center align-items-center">
                <div class="col-lg-6">
                    <form action="{{route('mails.send-mail')}}" method="POST">
                        @csrf
        
                        <div class="form-group">
                            <label for="title">Titulo:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    
                        <div class="form-group">
                            <label for="body">Mensaje: </label>
                            <div style="height: 300px" name="body" id="body"  class="form-control"></div>
                        </div>
        
                        <button type="submit" class="btn btn-success">Notificar</button>
                    </form>
                </div>
            </div>
        </div>
      </div>



    </html>

    <script>
window.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#body', {
          theme: 'snow' // Puedes elegir otros temas según tus preferencias
        });
    });

      </script>

@endsection