@extends('layouts.layout')

@section('content')

<div class="container">
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
          <div class="col-sm cuento-container">
            <a class="btn btn-link card-link card-link" href="{{route('paginas.read',$cuento->id)}}" data-toggle="tooltip" title="Leer">
              <img src="{{asset('rsc/read16.png')}}" alt="Leer">
            </a>
          </div>
          <div class="col-sm">
            <a class="btn btn-link card-link card-link" href="{{action('PaginaController@create',$cuento->id)}}" data-toggle="tooltip" title="Añadir Página">
              <img src="{{asset('rsc/newpage16.png')}}" alt="NuevaPágina">
            </a>
          </div>
          <div class="col-sm">
            <a class="btn btn-link card-link" href="{{route('cuentos.edit',$cuento->id)}}" data-toggle="tooltip" title="Editar">
              <img src="{{asset('rsc/edit16.png')}}" alt="Editar">
            </a>
          </div>
          <div class="col-sm">
            <form class="hidden" action="{{action('CuentoController@destroy',$cuento->id)}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" name="button" class="btn btn-link card-link-delete" data-toggle="tooltip" title="Eliminar">
                <img src="{{asset('rsc/delete16.png')}}" alt="Eliminar">
              </button>
            </form>
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
