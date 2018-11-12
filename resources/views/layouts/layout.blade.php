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
    
    <div class="container-fluid top-side">
      <div class="col-md col-sm col-xs">
        <img src="{{asset('rsc/logo.png')}}" class="img-fluid" id="logo-top" alt="center">
      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-ct">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/cuentos') }}">
          <i class="fas fa-home iconhome"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('cuentos.create')}}" data-toggle="modal" data-target="#crear">
                <i class="fas fa-pen-square" data-toggle="tooltip" title="Crear Cuento"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link" data-toggle="tooltip" title="Mi Biblioteca">
                <i class="fas fa-book-reader"></i>
              </a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link iconhome" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link iconhome" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
            @role('admin')
            <li class="nav-item col-xs align-self-center">
              <a href="{{route('admin.dashboard')}}" class="nav-link btn-sm btn-outline-warning" data-toggle="tooltip" title="Administración">
                <i class="fas fa-cogs"></i>
              </a>
            </li>
            @endrole
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->username }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

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
