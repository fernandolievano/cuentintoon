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
    <div class="col-sm-4">
      <div class="card-cuento">

        <div class="">
          <img src="{{asset('img/'.$cuento->cover)}}" class="cover mx-auto d-block" alt="cover">
        </div>

        <div class="card-info">
          <span class="badge badge-pill badge-nivel">{{$cuento->nivel}}</span>
          <span class="badge badge-pill badge-autor">{{$cuento->autor}}</span>
        </div>

        <div class="card-content">
            <div class="col-sm">
              <h2>{{$cuento->titulo}}</h2>
            </div>
            <div class="col-sm">
              <p>{{$cuento->descripcion}}</p>
            </div>
        </div>

        <footer class="card-actions">
        <div class="row">
          <div class="col-xs col-md cuento-container">
            <a class="btn btn-link btn-block form-button" href="{{route('paginas.read',$cuento->id)}}" data-toggle="tooltip" title="Leer">
              <img src="{{asset('rsc/read16.png')}}" class="img-fluid" alt="Leer">
            </a>
          </div>
        </div>
      </footer>
      </div>

    </div>

    @endforeach
  </div>
</div>
@include('scripts.fix-height')

@endsection

@section('paginate')
<nav aria-label="Page navigation example row justify-content-center">
  {{$cuentos->links()}}
</nav>
@endsection
