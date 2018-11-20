<!-- Dashboard de lector -->
<div class="card">

  <div class="card-header">
    <h3 class="display-6 dark-letter">Lector</h3>
  </div>

  <div class="card-body"> 

    <div class="row justify-content-center">

      <div class="col-md-6 col-sm-8 col-xs-12 align-self-center">
        @if(count($user->resultados) >= 1)

        <table class="table table-sm table-hover">
          <thead class="bg-3 text-light">
            <tr>
              <h2 class="display-6">Mis puntajes</h2>
            </tr>
            <tr>
              <th>Cuento</th>
              <th>Puntaje</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach( $user->resultados as $resultado )
            <tr>
              <td> {{ $resultado->prueba->cuento->titulo }} </td>
              <td> {{ $resultado->resultado }} </td>
              @if( $resultado->resultado > 20 )
              <td> <span class="text-success"> Aprobaste </span> </td>
              @else
              <td> <span class="text-danger"> Reprobaste </span> </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>

        @else 
        
        <div class="alert alert-info">
          No hay resultados para mostrar, todavía no has realizado ningún quizz
        </div>
        @endif

      </div>

      <div class="col-md-6 col-sm-8 col-xs-12 align-self-center">

        <table class="table table-sm table-hover">
          <thead class="bg-3 text-light">
            <tr>
              <h2 class="display-6">Mis cuentos favoritos</h2>
            </tr>
            <tr>
              <th>Cuento</th>
              <th colspan="2"></th>
            </tr>
          </thead>
        </table>

      </div>

    </div>
    
  </div>

</div>
    <!-- Fin Dashboard de lector -->