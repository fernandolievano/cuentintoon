@extends('layouts.layout')

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
      <div class="col-md-5 col-xs-12 border border-dark">
       <div class="row">
         <div class=" card-content col-md-12 col-xs-12 col align-self-center">
           {!! $pagina->contenido !!}
         </div>
         <div class="col-md-12 col-xs-12 col align-self-end">
           <form class="hidden" action="{{route('paginas.delete', $pagina->id)}}" method="post">
             @csrf  @method('DELETE')
             <button type="submit" class="btn btn-sm btn-danger">Eliminar página</button>
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
@include('scripts.fix-height')
<script>
  $("#pagina img").css("width","200px");
</script>
@endsection
