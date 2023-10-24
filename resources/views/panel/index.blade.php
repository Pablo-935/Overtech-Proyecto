@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row d-flex align-items-center">
      <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
        <h1>Bienvenido al sistema de Gestion de OVERTECH</h1>
        <h2>Construyendo juntos un futuro de innovación y excelencia.</h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="">
      </div>
    </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

   @stop

@section('css')

    <link rel="stylesheet" href="{{ public_path('/css/admin_custom.css') }}">
    <link href="{{ public_path('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    {{-- <link href="{{ public_path('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ public_path('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ public_path('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ public_path('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{ public_path('assets/css/style.css') }}" rel="stylesheet">
@stop

@section('js')

  <!-- Vendor JS Files -->
  <script src="{{ public_path('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ public_path('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ public_path('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ public_path('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ public_path('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ public_path('assets/js/main.js') }}"></script>
@stop

