        {!! Form::open(['action' => 'CuentoController@store','enctype' => 'multipart/form-data', 'id' => 'form']) !!}
        <div class="modal-body">
          
          @include('partials.errors')

          <div class="container-fluid">
            <div class="row justify-content-center">
              <h3>Información del cuento</h3>
            </div>
            <br>
            <div class="row form-items">
              <div class="col-md-12 col-xs-12">
                {!! Form::label('titulo', 'Título del cuento', ['class' => 'form-label']) !!}
                {!! Form::text('titulo', '', ['class' => 'form-input form-control form-control-sm', 'placeholder' => 'Título original del cuento' ,'required']) !!}
              </div>
            </div>
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
                {!! Form::text('autor','', ['class' => 'form-input form-control form-control-sm', 'placeholder' => 'Autor original del cuento o tu nombre si es un cuento propio' ,'required']) !!}
              </div>
            </div>
            <div class="row form-items">
              <div class="col-md-12 col-xs-12">
                {!! Form::label('cover', 'Foto de portada', ['class' => 'form-label']) !!}
                {!! Form::file('cover',['class' => ' form-control-sm form-control-file','required']) !!}
                <span class="text-muted"> <i>La imagen será redimensionada a 300x300px</i> </span>
              </div>
            </div>
            <div class="row form-items">
              <div class="col-md-12 col-xs-12">
                {!! Form::label('descripcion', 'Descripción', ['class' => 'form-label']) !!}
                {!! Form::textarea('descripcion', '', ['rows' => '3','cols' => '20' ,'class' => 'form-input cuentacaracteres form-control form-control-sm', 'maxlength' => '80', 'placeholder' => 'Dales a los lectores una breve descripción de tu cuento...' ,'required']) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          {!! Form::submit('¡Crear Cuento!', ['class' => 'btn form-button','id' => 'btn-validate']) !!}
        </div>
        {!! Form::close() !!}
