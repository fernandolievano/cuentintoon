@extends('layouts.layout')

@section('content')
 <div class="container">
   <div class="row justify-content-center">
     <div class="card preview-container col-md-12 col-xs-12">

       <div class="card-header row">
         <h1>{{ $cuento->titulo }}</h1>
         <div class="preview-footer col-md-12 col-xs-12">
           <div class="btn-group btn-group-sm" role="group">
             <a href="{{route('paginas.create', $cuento->id)}}" class="btn btn-primary">Crear otra página</a>
             <a href="#" class="btn btn-primary">Crear Quizz</a>
             <a href="{{route('paginas.ready')}}" class="btn btn-primary">Listo</a>
           </div>
         </div>
       </div>

       <div class="card-body row justify-content-center">
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

@include('scripts.fix-height')
@endsection
