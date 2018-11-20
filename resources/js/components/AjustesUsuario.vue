<template>

	<div class="row justify-content-center">

		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="card">

				<div class="card-header">

					<h3 class="display-6 text-secondary">Configuración de Usuario</h3>

				</div>

				<div class="card-body">

					<ul class="list-group">

						<li class="list-group-item active">
							Información personal
						</li>

						<li class="list-group-item text-left">
							<b>Nombre</b> <b>Apellido</b> 
							<button type="button" class="float-right btn btn-sm btn-dark">Editar</button>
						</li>

						<li class="list-group-item text-left">
							<b>Username</b>
							<button type="button" class="float-right btn btn-sm btn-dark">Editar</button>
						</li>

						<li class="list-group-item text-left">
							<b>E-mail</b> 
							<button type="button" class="float-right btn btn-sm btn-dark">Editar</button>
						</li>

						<li class="list-group-item text-left">
							<b>*********</b>
							<button type="button" class="float-right btn btn-sm btn-dark">Editar</button>
						</li>

						<li class="list-group-item text-left">
							<b>Avatar*</b>
							<button type="button" class="float-right btn btn-sm btn-dark">Editar</button>
						</li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</template>


<script type="text/javascript">



	export default {

		mounted: function() {

			console.log('Ajustes de Usuario mounted')

		}

	}



</script>