{!! Form::open(['class' => 'form-group', 'route' => ['pruebas.pregunta.store', $prueba->id]]) !!}
  <h3>Crea una pequeña evaluación para quienes lean <span class="dark-letter">{{$prueba->cuento->titulo}}</span></h3>

  <div class="pregunta border-top border-bottom"><br>
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-8 col-xs-8 alert alert-info text-center">
        <strong>No hay límite de preguntas, pero solo se mostrarán 5 (aleatorias)</strong>
      </div><br>

      @if( session('status') )
      <div class="col-md-8 col-sm-8 col-xs-8 alert alert-success text-center">
        <strong>{{ session('status') }}</strong><br>
        <strong>Tu prueba actualmente tiene {{ $prueba->preguntas->count() }} preguntas</strong>
      </div>
      @endif
    </div><br>
    <div class="row">
      <div class="col-md-10 col-xs-10">
        {!! Form::label('', 'Pregunta', []) !!}
        {!! Form::text('pregunta', '', ['class' => 'form-control form-control-sm',
                                        'placeholder' => 'Escribí tu pregunta acá',
                                        'required']) !!}
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-10 col-xs-10">
        {!! Form::label('respuestas', 'Respuestas', ['form-label']) !!}
        <br><span class="text-success">Correcta</span>
        {!! Form::text('correcta', '', ['class' => 'form-control form-control-sm',
                                        'placeholder' => 'Respuesta correcta a tu pregunta',
                                        'required']) !!}
        <span class="text-danger">Incorrecta</span>
        {!! Form::text('incorrecta1', '', ['class' => 'form-control form-control-sm',
                                           'placeholder' => 'Respuesta incorrecta a tu pregunta',
                                           'required']) !!}
        <span class="text-danger">Incorrecta</span>
        {!! Form::text('incorrecta2', '', ['class' => 'form-control form-control-sm',
                                           'placeholder' => 'Respuesta incorrecta a tu pregunta',
                                           'required']) !!}
        <span class="text-danger">Incorrecta</span>
        {!! Form::text('incorrecta3', '', ['class' => 'form-control form-control-sm',
                                           'placeholder' => 'Respuesta incorrecta a tu pregunta',
                                           'required']) !!}
      </div>
    </div><br>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6 col-xs-6">
      {!! Form::submit('Nueva Pregunta', ['class' => 'btn btn-block btn-primary']) !!}
    </div>
    @if (count($prueba->preguntas) > 4)
      <div class="col-md-6 col-xs-6">
      <a href="{{route('home')}}" class="btn btn-block form-button">Terminar Quizz</a>
      </div>
    @endif  
  </div>
{!! Form::close() !!}
