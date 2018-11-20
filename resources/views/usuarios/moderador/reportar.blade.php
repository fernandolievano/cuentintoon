<div class="modal fade" id="reportar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="display-6 text-danger">
					Reportar {{ $cuento->titulo }}
				</h1>
			</div>
			<form action=" {{ route('cuentos.reportar', $cuento->id) }} " method="post" id="reportando"> 
				@csrf
				<div class="modal-body">
					<textarea name="motivo" class="form-control form-control-sm cuentacaracteres" maxlength="200" placeholder="Explica el motivo de este reporte" required></textarea>	
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm form-button" form="reportando">Enviar Reporte</button>
				</div>
			</form>
		</div>
	</div>
</div>