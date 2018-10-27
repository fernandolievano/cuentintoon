@extends('layouts.layout')

@section('content')

<div class="row justify-content-center">

  <div class="col-8 form-container">
      <div class="row justify-content-center">
        <h1 class="display-4 form-header"><span class="dark-letter">E</span>ditar Cuen<span class="dark-letter">t</span>o</h1>
      </div>
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
      {!! Form::open(['action' => ['CuentoController@update', $cuento->id],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
      {!! Form::hidden('_method', 'PATCH', []) !!}
      <div class="row form-items">
        <h3>Rellena correctamente los espacios.</h3>
      </div>
      <div class="row form-items justify-content-center">
        <span class="badge badge-danger badge-form">Todos los campos son obligatorios*</span>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('titulo', 'Título del cuento:', ['class' => 'form-label','required']) !!}
        </div>
        <div class="col-3">
          {!! Form::text('titulo', $cuento->titulo , ['class' => 'form-input']) !!}
        </div>
      </div>
      {!! Form::hidden('idprofesor', $value='1', []) !!}
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('nivel', 'Nivel del cuento:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::select('nivel', ['1' => 'Nivel Uno',
                                      '2' => 'Nivel Dos',
                                      '3' => 'Nivel Tres',
                                      '4' => 'Nivel Cuatro',
                                      '5' => 'Nivel Cinco'],  []) !!}
        </div>
      </div>
      {!! Form::hidden('estado', $value='publicado', []) !!}
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('autor', 'Autor:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::text('autor',$cuento->autor, ['class' => 'form-input']) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('cover', 'Foto de portada:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::file('cover',[]) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('descripcion', 'Descripción del cuento:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::textarea('descripcion', $cuento->descripcion, ['rows' => '2', 'cols' => '20', 'class' => 'form-input']) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-2">
          {!! Form::submit('Editar Cuento', ['class' => 'btn form-button','id' => 'btn-validate']) !!}
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
<!-- Script para alert -->
<script type="text/javascript">
  $('.alert').alert()
</script>
<!-- Script para validar -->
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {
            titulo: {
                required: true,
                minlength: 3
            },
            autor: {
                required: true,
                minlength: 5
                
            },
            descripcion: {
                required: true,
                maxlength: 80
                
            },
            cover: {
                required: true,
                extension: "jpeg|png"
            },
        }
    });
});
</script>
@endsection
