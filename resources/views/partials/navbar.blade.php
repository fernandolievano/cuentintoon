<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start navbar-laravel navbar-ct sticky-top">
  <div class="container-fluid">

    <!-- Brand -->
    <a class="navbar-brand iconhome" href="{{ url('/cuentos') }}">
      <i class="fas fa-home"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->

    <!-- Collapse -->
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="navbarSupportedContent">

      <!-- Lado Izquierdo -->
      <ul class="navbar-nav mr-auto">
        @guest
        <li></li>
        @else
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#crear">
            <i class="fas fa-pen" data-toggle="tooltip" title="Crear Cuento"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="fas fa-book-reader" data-toggle="tooltip" title="Mi Biblioteca"></i>
          </a>
        </li>
        <li class="nav-item">
          <span class="nav-link disabled">
            <i class="fas fa-user-circle"></i>
          </span>
        </li>
        <li class="nav-item" data-toggle="tooltip" title="Tus puntos de lector">
          <h5 class="navbar-text">
            {{ Auth::user()->username }}
            <span class="badge badge-autor">
             {{ Auth::user()->puntos }} 
            </span>
          </h5>
        </li>
        @endguest
      </ul>
      <!-- Lado Izquierdo -->
      <!-- Lado derecho -->

      <ul class="nav flex-row justify-content-md-center justify-content-start flex-nowrap">
        @guest
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link dark-letter" data-toggle="tooltip" title="Inicia Sesion">
            <i class="fas fa-sign-in-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link dark-letter" data-toggle="tooltip" title="Registrate">
            <i class="fas fa-user-plus"></i>
          </a>
        </li>
        @else
          @role('admin')
          <li class="nav-item col-xs align-self-center">
            <a href="{{route('admin.dashboard')}}" class="nav-link btn-sm btn-outline-secondary" data-toggle="tooltip" title="Administración">
              <i class="fas fa-cogs"></i>
            </a>
          </li>
          @endrole
        <li class="nav-item">
          <a class="nav-link logout" data-toggle="tooltip" title="Cerrar Sesion" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </a>
        </li>
        @endguest
      </ul>

      <!-- Lado derecho -->

    </div>
    <!-- Collapse -->

  </div>
</nav>
