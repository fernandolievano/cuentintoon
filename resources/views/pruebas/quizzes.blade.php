@extends('layouts.layout')

@section('content')

	@if (count($pruebas) < 1)
		<div class="alert alert-warning text-center">
			No hay pruebas para mostrar
		</div>
	@endif	
	<div class="well bg-light">
		<ul class="list-unstyled">
			
				@foreach($pruebas as $prueba)
				<form action="{{ route('pruebas.evaluar', $prueba->id) }}" method="post">
			@csrf
			<li>
				@foreach($prueba->preguntas as $pregunta)

				<div class="form-group">
					<p class="text-danger">{{ $pregunta->pregunta }}</p>
					
					
					@foreach($pregunta->respuestas as $respuesta)
					<div class="form-check" name="{{ $respuesta->id }}">
  						<input class="form-check-input" type="radio" name="respuesta[{{ $pregunta->id }}]" id="" value="{{ $respuesta->id }}">
  						<label class="form-check-label" for="">
    						{{ $respuesta->respuesta }}  						
    					</label>
    				</div><br>
    				@endforeach
				</div>
					
					
				@endforeach
			</li>
			<hr>
			<button type="submit" class="btn btn-block btn-primary">Enviar</button>
			</form>
			@endforeach
			
		</ul>
	</div>
@endsection