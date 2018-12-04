<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cuentintoon! - Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
  </head>
  <body>

    <!-- Top side -->
    <div class="container-fluid top">
      @include('admin.partials.header')
    </div>
    <!-- Top side -->

    <!-- Middle side -->
    <div class="container mid">
      @yield('content')
      @include('admin.roles')
      @include('admin.permisos')
      @include('admin.asignarpermisos')
      @include('admin.asignarroles')
    </div>
    <!-- Middle side -->

    <!-- Bottom side -->
    <footer class="container-fluid navbar justify-content-center bot">
      @include('admin.partials.footer')
    </footer>
    <!-- Bottom side -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('scripts.toastr')
  </body>
</html>
