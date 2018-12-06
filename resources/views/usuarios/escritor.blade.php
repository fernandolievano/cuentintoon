<!-- Dashboard de escritor -->
<div class="row justify-content-center">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="card-header">
        <h3 class="display-6 dark-letter">Escritor</h3>
      </div>
      <div class="card-body">
        @if(count($user->cuentos) < 1)
        <div class="alert alert-info">
          Todavía no has creado ningún cuento
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
              @if( $cuento->estado == 'Reportado')
              <td colspan="2">
                <a href="{{ route('cuentos.reportes', $cuento->id) }}" class="btn btn-sm btn-danger btn-block"  title="">Ver reporte</a>
              </td>
              @else
              <td>
                <a href="{{route('cuentos.edit', $cuento->id)}}" class="btn btn-sm form-button">Editar Info</a>
              </td>
              <td>
                <a href="{{route('paginas.create', $cuento->id)}}" class="btn btn-sm form-button">Agregar Página</a>
              </td>
              @endif
              <td>
                <form class="hidden" action="{{route('pruebas.store', $cuento->id)}}" method="post">
                  @csrf <input type="hidden" name="prueba" value="quizz">
                  <button type="submit" class="btn btn-sm form-button">Crear Quizz</button>
                </form>
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