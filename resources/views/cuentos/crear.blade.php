<div class="modal" id="crear">
  <div class="modal-dialog">
    <div class="modal-content form-container">
      <div class="modal-header">
        <h1 class="display-4 form-header"><span class="dark-letter">C</span>rear Cuen<span class="dark-letter">t</span>o</h1>
        <button type="button" class="close float-right" data-dismiss="modal" name="button">
          <span>&times;</span>
      </div>
        {!! Form::open(['action' => 'CuentoController@store','enctype' => 'multipart/form-data', 'id' => 'form']) !!}
      <div class="modal-body">
        <!-- Errores de validación backend -->
        <div class="validate">
          @if(count($errors) > 0)
          <div class="alert alert-danger validate-error alert-dismissible fade show" role="alert">
              <ul style="list-style-type: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </div>
          @endif
        </div>
        <!-- Fin errores  -->

        <div class="container-fluid">
          <div class="row justify-content-center">
            <h3>Información del cuento</h3>
            <span class="badge badge-danger badge-form">Todos los campos son obligatorios*</span>
          </div>
          <br>
          <div class="row form-items">
            <div class="col-md-12 col-xs-12">
              {!! Form::label('titulo', 'Título del cuento', ['class' => 'form-label']) !!}
              {!! Form::text('titulo', '', ['class' => 'form-input form-control form-control-sm','required']) !!}
            </div>
          </div>
          {!! Form::hidden('idprofesor', $value='1', []) !!}
          <div class="row form-items">
            <div class="col-md-12 col-xs-12">
              {!! Form::label('nivel', 'Dificultad del cuento', []) !!}
            </div>
            <div class="col-md-12 col-xs-12">
              <div class="form-check form-check-inline">
                {!! Form::radio('nivel', '1', '', ['class' => 'form-check-input','id' => 'nivel1']) !!}
                {!! Form::label('nivel1', '1', ['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check form-check-inline">
                {!! Form::radio('nivel', '2', '', ['class' => 'form-check-input','id' => 'nivel2']) !!}
                {!! Form::label('nivel2', '2', ['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check form-check-inline">
                {!! Form::radio('nivel', '3', '', ['class' => 'form-check-input','id' => 'nivel3']) !!}
                {!! Form::label('nivel3', '3', ['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check form-check-inline">
                {!! Form::radio('nivel', '4', '', ['class' => 'form-check-input','id' => 'nivel4']) !!}
                {!! Form::label('nivel4', '4', ['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check form-check-inline">
                {!! Form::radio('nivel', '5', '', ['class' => 'form-check-input','id' => 'nivel5']) !!}
                {!! Form::label('nivel5', '5', ['class' => 'form-check-label']) !!}
              </div>
            </div>
          </div>
          <div class="row form-items">
            <div class="col-md-12 col-xs-12">
              {!! Form::label('autor', 'Autor', ['class' => 'form-label']) !!}
              {!! Form::text('autor','', ['class' => 'form-input form-control form-control-sm','required']) !!}
            </div>
          </div>
          <div class="row form-items">
            <div class="col-md-12 col-xs-12">
              {!! Form::label('cover', 'Portada', ['class' => 'form-label']) !!}
              {!! Form::file('cover',['class' => ' form-control-sm form-control-file','required']) !!}
            </div>
          </div>
          <div class="row form-items">
            <div class="col-md-12 col-xs-12">
              {!! Form::label('descripcion', 'Descripción', ['class' => 'form-label']) !!}
              {!! Form::textarea('descripcion', '', ['rows' => '3','cols' => '20' ,'class' => 'form-input cuentacaracteres form-control form-control-sm', 'maxlength' => '80','required']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {!! Form::submit('¡Crear Cuento!', ['class' => 'btn form-button','id' => 'btn-validate']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@section('scripts')
  <!-- Script para alert -->
  <script type="text/javascript">
    $('.alert').alert()
  </script>
  
  @include('scripts.validar-cuento')
  @include('scripts.caracteres-cuento')

@endsection