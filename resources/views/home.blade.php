@extends('layouts.layout')

@section('content')
<div class="container">


      @if (session('status'))
          <div class="alert alert-success col-md-12 col-xs-12 text-center" role="alert">
              {{ session('status') }}
          </div>
      @endif


    <!-- Dashboard de moderador -->
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Moderador</div>

                <div class="card-body">

                    @if(count($cuentosPendientes) < 1)
                    <div class="alert alert-info">
                      <strong>No hay cuentos en Revisión</strong>
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
      <div class="col-md-10 col-xs-10">
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
                    <div class="btn-group btn-group-sm" role="group">
                      <a href="{{route('cuentos.edit', $cuento->id)}}" class="btn form-button">Editar Info</a>
                      <a href="{{route('paginas.create', $cuento->id)}}" class="btn form-button">Nueva Página</a>
                    </div>
                  </td>
                  <td>
                    <form class="hidden" action="{{route('pruebas.store', $cuento->id)}}" method="post">
                      @csrf <input type="hidden" name="prueba" value="quizz">
                      <button type="submit" class="btn btn-sm form-button">Crear Quizz</button>
                    </form>
                  </td>
                  <td>
                    <form class="hidden" action="{{route('cuentos.destroy', $cuento->id)}}" method="post">
                      @csrf   @method('DELETE')
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Eliminar Cuento">
                        <img src="{{asset('rsc/delete16.png')}}" class="rounded mx-auto d-block img-fluid" alt="icon">
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
    </div>
    <!-- Fin Dashboard de escritor -->
</div>

@endsection
