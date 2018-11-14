@extends('layouts.layout')

@section('content')
<div class="container">


      @if (session('status'))
          <div class="alert alert-success col-md-12 col-sm-12 col-xs-12 text-center" role="alert">
              {{ session('status') }}
          </div><br>
      @endif

      @if (session('aprobado'))
        <div class="card">
          <div class="car-header">
            <h3 class="text-success text-center">¡Felicidades, aprobaste!</h3>
          </div>
          <div class="card-body">
            <strong class="text-center"> {{ session('aprobado') }} </strong>
          </div>
        </div><br>
      @endif

      @if (session('reprobado'))
        <div class="card">
          <div class="card-header">
            <h3 class="text-danger text-center">Lo sentimos...</h3>
          </div>
          <div class="card-body">
            <strong class="text-center"> {{ session('reprobado') }} </strong>
          </div>
        </div><br>
      @endif

    <!-- Dashboard de moderador -->
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Moderador</div>

                <div class="card-body">

                    @if(count($cuentosPendientes) < 1)
                    <div class="alert alert-info">
                      <strong>No hay cuentos en revisión</strong>
                    </div>

                    @else
                    <h2>Cuentos en revisión</h2>
                    <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th>Cuento</th>
                          <th>Subido por</th>
                          <th colspan="2"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cuentosPendientes as $cuento)
                        <tr>
                          <td>{{$cuento->titulo}}</td>
                          <td>{{$cuento->user->username}}</td>
                          <td>
                            <a href="#" class="btn btn-sm form-button">Inspeccionar</a>
                          </td>
                          <td>
                            <form class="hidden" action="{{route('cuentos.publicar', $cuento->id)}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                              <button type="submit" class="btn btn-sm form-button">Publicar</button>
                            </form>
                          </td>
                          <td>
                            <a href="#" class="btn btn-sm btn-danger">Reportar</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- Fin Dashboard de moderador -->


    <!-- Dashboard de escritor -->
    <br>
    <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-header">Escritor</div>
          <div class="card-body">
            @if(count($user->cuentos) < 1)
            <div class="alert alert-info">
              <strong>Todavía no has creado ningún cuento</strong>
            </div>
            @else
            <table class="table table-sm table-striped">
              <thead>
                <tr>
                <h2>Mis cuentos</h2>
                </tr>
                <tr>
                  <th>Titulo</th>
                  <th>Estado</th>
                  <th colspan="2"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->cuentos as $cuento)
                <tr>
                  <td>{{$cuento->titulo}}</td>
                  <td>{{$cuento->estado}}</td>
                  <td>
                    <a href="{{route('cuentos.edit', $cuento->id)}}" class="btn btn-sm form-button">Editar Info</a>
                  </td>
                  <td>
                    <a href="{{route('paginas.create', $cuento->id)}}" class="btn btn-sm form-button">Agregar Página</a>
                  </td>
                  <td>
                    <form class="hidden" action="{{route('pruebas.store', $cuento->id)}}" method="post">
                      @csrf <input type="hidden" name="prueba" value="quizz">
                      <button type="submit" class="btn btn-sm form-button">Crear Quizz</button>
                    </form>
                  </td>
                  <td>
                    <a href="{{route('pruebas.show', $cuento->id)}}" class="btn btn-sm btn-xs form-button">Quizzes de {{ $cuento->titulo }}</a>
                  </td>
                  <td>
                    <form class="hidden" action="{{route('cuentos.destroy', $cuento->id)}}" method="post">
                      @csrf   @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm btn-xs" data-toggle="tooltip" title="Eliminar Cuento">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div><br>
    <!-- Fin Dashboard de escritor -->


    <!-- Dashboard de lector -->
    <div class="card">
      <div class="card-header">
        Lector
      </div>
      <div class="card-body">
        <ul>
          @foreach($user->resultados as $resultado)
          <li> {{ $resultado->resultado }} </li><span class="text-primary"> {{ $resultado->prueba->cuento->titulo }} </span>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- Fin Dashboard de lector -->
</div>

@endsection
