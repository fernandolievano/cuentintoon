<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cuentintoon!</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Stylesheet's-->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/cuentintoon.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  @yield('styles')
  <!-- Fonts -->
  <style>
  @import url('https://fonts.googleapis.com/css?family=Cherry+Swash:700|Gabriela');
</style>
</head>
<body>

  <div id="app">
    
    @include('partials.navbar')
    <div class="container-fluid top-side">

          <img src="{{asset('rsc/simple_logo_ct.png')}}" class="img-fluid mx-auto d-block" id="logo-top" alt="center">

          @yield('messages')

    </div>

  <main class="mid-side container-fluid">
    @yield('content')
  </main>

  <div class="container-fluid text-center">
    <div class="row justify-content-center">
      @yield('paginate')
    </div>
  </div>

  @include('cuentos.crear')  
</div>

<!-- Script's Zone -->
<script src="{{ asset('js/app.js') }}"></script>
@include('scripts.toastr')
@include('scripts.tooltip')
@yield('scripts')

</body>
</html>
