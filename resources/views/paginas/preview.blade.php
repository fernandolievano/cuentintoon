@extends('layouts.layout')

@php 
  $contador = 0;
@endphp

@section('content')
<div class="container">
 <div class="row justify-content-center">
   <div class="card preview-container col-md-12 col-xs-12">

    <div class="card-header row">
       <div class=" col-md-12 col-sm-12 col-xs-12">
         <h1>{{ $cuento->titulo }}</h1>
       </div>

       <div class="preview-footer col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="{{route('paginas.create', $cuento->id)}}" class="float-left btn btn-lg form-button" data-toggle="tooltip" title="Añadir nueva página">
              <i class="fas fa-plus-circle"></i>
            </a>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <h3 class="text-center text-light">Todas las páginas</h3>                        
          </div>               
          <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="{{route('paginas.ready', $cuento->id)}}" class="float-right btn btn-lg form-button" data-toggle="tooltip" title="Cuento terminado">
              <i class="far fa-check-circle"></i>
            </a>
          </div> 
        </div>
      </div>

    </div>

    <div class="card-body row justify-content-center" id="pagina">

      @foreach($cuento->paginas as $pagina)

      @php
        $contador = $contador+1;
      @endphp

      <div class="col-md-8 col-sm-12 col-xs-12 pagina-inspeccionar">
       <div class="row">
         <div class=" card-content col-md-12 col-xs-12 col align-self-center">
           {!! $pagina->contenido !!}
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5 text-left align-self-center">
           <a href=" {{ route('paginas.edit', $pagina->id) }} " class="btn btn-sm btn-light">Editar</a>
         </div>
         <div class="col-md-2 col-sm-2 col-xs-2 text-center align-self-center">
           <span class="badge badge-pill badge-light">
            {{ $contador }}
           </span>
         </div>
         <div class="col-md-5 col-sm-5 col-xs-5 text-right align-self-center">
           <form class="hidden" action="{{route('paginas.delete', $pagina->id)}}" method="post">
             @csrf  @method('DELETE')
             <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
           </form>
         </div>
       </div>
     </div>
     @endforeach
   </div>

 </div>
</div>
</div>
@endsection

@section('scripts')
<script>
  $("#pagina img").css({"width":"100%", "height":"50%"});
</script>

@endsection
