<div class="modal fade" id="quizz">
	<div class="modal-dialog modal-lg form-container">
		<div class="modal-content">

			<!-- Si el usuario ya aprobó el quizz -->

			@if(count($resultados)>=1)
			<div class="modal-header">
				<h2 class="text-center">Ya has realizado y aprobado este quizz</h2>
				<button type="button" class="close float-right" data-dismiss="modal" name="button">
					<span>&times;</span>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md col-sm col-xs">
							@foreach($resultados as $resultado)
						<p class="blockquote">Tu resultado fue de 
							<b class="text-success"> {{ $resultado->resultado }} </b> 
						</p>
						<span class="blockquote-footer"> {{ $resultado->created_at }} </span>
						@endforeach
					</div>
				</div>
			</div>
			<div class="modal-footer">
					<a class="btn btn-block btn-info" href=" {{ route('home') }} ">Volver a Mi Biblioteca</a>
			</div>

			@else	

			<!-- Si el usuario no ha realizado el quizz -->

			<form action=" {{ route('pruebas.evaluar', $prueba->id) }} " method="post">
				@csrf
				<div class="modal-header">
					<h2>Responde correctamente según lo que has leído</h2>
					<button type="button" class="close float-right" data-dismiss="modal" name="button">
					<span>&times;</span>
				</div>
				<div class="modal-body text-left">
					<ul class="list-unstyled">
						@foreach($prueba->preguntas->random(5)->shuffle() as $pregunta)
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
					<button type="submit" class="btn form-button">¡Listo!</button>
				</div>
			</form>

			@endif

		</div>
	</div>	
</div>
