@extends('layouts.layout')

@section('content')
	<div class="well bg-light">
		<ul class="list-unstyled">
			@foreach($pruebas as $prueba)
			<li>
				@foreach($prueba->preguntas as $pregunta)
				<h5>Pregunta</h5>
				<p class="text-danger">{{ $pregunta->pregunta }}</p><br>
					<h6>Respuestas</h6>
					@foreach($pregunta->respuestas as $respuesta)
					<span class="text-muted"><small>{{ $respuesta->respuesta }} ,</small></span>
					@endforeach
				@endforeach
			</li>
			<hr>
			@endforeach
		</ul>
	</div>
@endsection