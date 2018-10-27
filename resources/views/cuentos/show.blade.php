@extends('layouts.main')

@section('content')
  <div class="card">
    <header class="card-header">
        <h2 class="display-4">{{$cuento->titulo}}</h2>
        <p class="lead">Nivel de dificultad: {{$cuento->nivel}}</p>
    </header>
    <div class="card-body">
      <div class="">
        <img class="img-thumbnail rounded mx-auto d-block" src="{{asset('img/'.$cuento['cover'])}}" alt="portada">
      </div>
      <br>
      <div class="blockquote">
          {{$cuento['descripcion']}}
      </div>
      <footer class="card-footer" style="background-color:white;">
        <ul>
          <li>Autor:{{$cuento['autor']}} | {{$cuento['created_at']}}</li>
        </ul>
      </footer>
    </div>
    <footer class="card-footer row">
      <div class="col">
        <a style="color:white" href="{{action('CuentoController@edit',$cuento['id'])}}" class="btn btn-warning">Editar</a>
      </div>
      <div class="col">
        <form class="" action="{{action('CuentoController@destroy',$cuento['id'])}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name="button">Borrar</button>
        </form>
      </div>
    </footer>
  </div>
@endsection
