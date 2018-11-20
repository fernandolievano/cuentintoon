<div class="modal fade" id="solicitar-rol">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h3>¿Por qué quiere crear cuentos?</h3>
				<button type="button" class="close float-right" data-dismiss="modal" name="button">
        		<span>&times;</span>
			</div>

			<form action=" {{ route('user.solicitar.rol') }} " method="post"> @csrf
	
				<div class="modal-body">
					<textarea name="motivo" class="cuentacaracteres form-control form-control-sm" placeholder="Especifique brevemente el motivo de esta solicitud" maxlength="125" required focus></textarea>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-sm form-button">Enviar solicitud</button>
				</div>

			</form>

		</div>
	</div>
</div>

@section('scripts')
	@include('scripts.caracteres-cuento')
@endsection