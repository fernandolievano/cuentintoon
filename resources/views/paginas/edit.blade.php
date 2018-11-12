@extends('layouts.layout')


@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')

<div class="row justify-content-center">
  <div class="col-10 form-container">
    <header>
      <h1 class="display-4">E<span class="dark-letter">d</span>itar cu<span class="light-letter">en</span>to</h1>
    </header>

    <!-- Errores de validación -->
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

      {!! Form::open(['route' => ['paginas.update', $pagina->id]]) !!}
      @method('PUT')
      <div class="form-group">
        {!! Form::textarea('contenido', $pagina->contenido, ['class' => 'form-control summernote','id' => 'summernote']) !!}
      </div>
      <div class="preview-footer row">
        {!! Form::submit('Actualizar Página', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
      </div>
      {!! Form::close() !!}

    </div>
  </div>
  @endsection

  @section('scripts')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
  @include('scripts.summernote')
  @endsection
