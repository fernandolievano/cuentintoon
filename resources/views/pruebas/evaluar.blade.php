<div class="modal fade" id="quizz">
	<div class="modal-dialog modal-lg form-container">
		<div class="modal-content">
			<form action=" {{ route('pruebas.evaluar', $prueba->id) }} " method="post">
				<div class="modal-header">
					<h2>Responde correctamente según lo que has leído</h2>
				</div>
				<div class="modal-body text-left">
					<ul class="list-unstyled">


						@csrf
						@foreach($preguntas as $pregunta)
						<div class="form-group">
							
							<h5 class="display-5"> {{ $pregunta->pregunta }} </h5>
							@foreach($pregunta->respuestas->shuffle() as $respuesta)
							<div class="form-check" name=" {{ $respuesta->id }} ">
								<input class="form-check-input" type="radio" name="respuesta[{{ $pregunta->id }}]" value="{{ $respuesta->id }}">
								<label class="form-check-label" for="respuesta[{{ $pregunta->id }}]">
									{{ $respuesta->respuesta }}  						
								</label>
							</div>
							@endforeach
							
						</div>
						@endforeach


					</ul>	
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn form-button">Send</button>
				</div>
			</form>
		</div>
	</div>
</div>
