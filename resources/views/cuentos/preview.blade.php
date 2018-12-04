@extends('layouts.layout')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-8 preview-container">
    <header>
      <h1 class="display-4"> <span class="dark-letter">V</span>ista Pre<span class="dark-letter">v</span>ia</h1>
      <h3>{{$cuento->titulo}}</h3> <span class="badge badge-nivel">Nivel:{{$cuento->nivel}}</span>
    </header>
    <div class="preview-body">
      <img class="img-thumbnail rounded mx-auto d-block" src="{{asset('img/'.$cuento['cover'])}}" alt="cover">
      <div class="blockquote">
        {{$cuento['descripcion']}}
      </div>
      <div class="blockquote-footer">
        {{$cuento->autor}}
      </div>
    </div>
    <footer class="preview-footer row">
      <div class="col-md col-xs">
        <form class="" action="{{action('CuentoController@destroy',$cuento['id'])}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name="button">Cancelar</button>
        </form>
      </div>
      <div class="col-md col-xs">
        <a style="color:white" href="{{action('CuentoController@edit',$cuento->id)}}" class="btn form-button">Editar</a>
      </div>
      <div class="col-md col-xs">
        <a style="color:white" href="{{action('PaginaController@create',$cuento->id)}}" class="btn form-button">Continuar</a>
      </div>
    </footer>
  </div>
</div>

@endsection
