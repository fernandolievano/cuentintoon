<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cuentintoon!</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Stylesheet's and Scripts -->

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/cuentintoon.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
  <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>

  <!-- Fonts -->
  <style>
  @import url('https://fonts.googleapis.com/css?family=Cherry+Swash:700|Gabriela');
  </style>
</head>
<body>

  <div class="container-fluid top-side">
    <div class="col-md col-sm col-xs">
      <img src="{{asset('rsc/logo.png')}}" class="img-fluid" id="logo-top" alt="center">
    </div>
  </div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-ct">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link iconhome" href="{{route('cuentos.index')}}">
              <img src="{{asset('rsc/home32.png')}}" alt="home" class="home-icon">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('cuentos.create')}}" data-toggle="modal" data-target="#crear">
              <img src="{{asset('rsc/pencil32.png')}}" alt="create" data-toggle="tooltip" title="Crear Cuento" class="link-navbar">
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link" data-toggle="tooltip" title="Mi Biblioteca">
              <img src="{{asset('rsc/book32.png')}}" alt="miscuentos" class="link-navbar">
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
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <span>Administración</span>
            </a>
          </li>
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

<main class="mid-side container-fluid" id="app">
  @yield('content')
  @include('cuentos.crear')
</main>

<div class="container-fluid text-center">
  <div class="row justify-content-center">
    @yield('paginate')
  </div>
</div>

<!-- Script's Zone -->
@include('scripts.tooltip')
@include('scripts.toastr')

</body>
</html>
