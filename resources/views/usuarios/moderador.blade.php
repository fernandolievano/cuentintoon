    <!-- Dashboard de moderador -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card">

          <div class="card-header">
            <h3 class="display-6 dark-letter">Moderador</h3>
          </div>

          <div class="card-body">

            @if(count($cuentosPendientes) < 1)
            <div class="alert alert-info">
              No hay cuentos en revisión
            </div>

            @else
            <h2>Cuentos en revisión</h2>
            <table class="table table-sm table-xs table-hover">
              <thead>
                <tr>
                  <th>Cuento</th>
                  <th>Última actualización</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($cuentosPendientes as $cuento)
                <tr>
                  <td> {{ $cuento->titulo }} </td>
                  <td> {{ $cuento->updated_at }} </td>
                  <td class="text-right">
                    <a href="{{ route('cuentos.inspeccionar', $cuento->id) }}" class="btn btn-sm form-button" title="">Inspeccionar</a>
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