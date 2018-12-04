@extends('layouts.layout')

@section('content')

<div class="container form-container">
  <header class="text-center row">
    <h1 class="display-4">Nuevo <span class="dark-letter">Q</span>uizz</h1>
  </header>

  @include('pruebas.partials.crearPreguntas')

</div>

@endsection
