@guest

@else
@if( Auth::user()->solicitud )
<div class="modal-body">
	<div class="alert alert-info">
		Ya solicitaste el rango "Escritor", por favor espera a la respuesta del Administrador
	</div>
</div>
@else
<div class="modal-body">
	<div class="alert alert-danger text-center">
		Sólo los usuarios con rango "Escritor" pueden crear cuentos
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-sm form-button" data-toggle="modal" data-target="#solicitar-rol">Solicitar rango de escritor</button>
</div>
@endif
@endguest