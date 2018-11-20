    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-ct sticky-top">
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
            @guest 
            <li></li>
            @else
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
            <li class="nav-item" data-toggle="tooltip" title="Tus puntos de lector">
              <h6>
                {{ Auth::user()->username }}
                <span class="badge badge-autor"> {{ Auth::user()->puntos }} </span>
              </h6>
            </li>
            @endguest
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link iconhome" href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link iconhome" href="{{ route('register') }}">{{ __('Registrate') }}</a>
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
                Cuenta <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
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