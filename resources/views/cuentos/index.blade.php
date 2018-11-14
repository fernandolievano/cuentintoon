@extends('layouts.layout')

@section('content')

<div class="container">

  @if(count($cuentos) < 1)
  <div class="row justify-content-center text-center">
    <div class="alert alert-info col-md col-xs">
      <strong>No hay cuentos para mostrar</strong>
    </div>
  </div>
  @endif

  <div class="row">
    @foreach($cuentos as $cuento)
    <div class="col-md-4 col-sm-4 col-xs-4">
      <div class="card-cuento">

        <div class="">
          <img src="{{asset('img/'.$cuento->cover)}}" class="cover mx-auto d-block border border-info" alt="cover">
        </div>

        <div class="card-content">
          <div class="col-sm">
            <h2 class="display-6">{{$cuento->titulo}}</h2>
          </div>
          <div class="col-sm">
            <p>{{$cuento->descripcion}}</p>
          </div>
        </div>

        <div class="card-info">
          <span class="badge badge-pill badge-info" data-toggle="tooltip" title="Nivel de dificultad">{{$cuento->nivel}}</span>
          <span class="badge badge-pill badge-info" data-toggle="tooltip" title="Autor">{{$cuento->autor}}</span>
          <fecha-cuento :cuento="{{ $cuento }}" data-toggle="tooltip" title="Creado"></fecha-cuento>
        </div>

        <footer class="card-actions">
          <div class="row justify-content-center">
            <div class="col-xs col-md cuento-container">
              <a class="btn btn-link btn-block form-button" href="{{route('paginas.read',$cuento->id)}}" data-toggle="tooltip" title="Leer">
                <i class="fas fa-book-open"></i>
              </a>
            </div>
          </div>
        </footer>
      </div>

    </div>

    @endforeach
  </div>
</div>
@endsection

@section('paginate')
<nav aria-label="Page navigation example row justify-content-center">
  {{$cuentos->links()}}
</nav>
@endsection

@section('scripts')
@include('scripts.fix-height') 
@endsection
