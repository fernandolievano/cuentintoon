<template>
	<div class="alert alert-success row justify-content-center">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<strong>¡Feliciidades, has completado la lectura!</strong>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<button type="button"class="btn btn-success" data-toggle="modal" data-target="#quizz">	Suma puntos realizando un pequeño quizz sobre lo que leíste
			</button>
		</div>

		<div class="modal fade" id="quizz">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p class="alert alert-primary strong">
							El modal funciona
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>


<script>
	export default {
		mounted: function () {
			console.log('Quizz.vue mounted')
		}
	}
</script>