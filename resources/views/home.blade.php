@extends('layouts.layout')

@section('messages')

      @include('usuarios.mensajes')

@endsection

@section('content')

<div class="container">

  @role('mod')
    @include('usuarios.moderador')
  @endrole
  <br>
  @role('escritor')
    @include('usuarios.escritor')
  @endrole
  <br>
  @role('lector')
    @include('usuarios.lector')
  @endrole
  <br><br>

  <ajustes-usuario></ajustes-usuario>

</div>

@endsection
