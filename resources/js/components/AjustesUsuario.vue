<template>

	<div class="row justify-content-center">

	  <div class="col-md-12 col-sm-12 col-xs-12">

	    <div class="card">

	      <div class="card-header">

	        <h3 class="display-6 dark-letter">
	          Configuración de Usuario
	        </h3>

	      </div>

	      <div class="card-body">

	        <div class="row justify-content-center">
	          <div class="col-xs-12 col-sm-12">
	            <h4 class="display-6">Información personal</h4>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-xs-9 col-sm-9 text-left align-self-center">
	            <b class="text-muted" v-text="usuario.name+' '+usuario.lastname"></b>
	          </div>
	          <div class="col-xs-3 col-sm-3 align-self-center">
	            <button type="button" name="button" class="btn btn-sm btn-block btn-dark" @click.prevent="cambiarNombre(usuario)">Cambiar nombre</button>
	          </div>
	        </div>
	        <hr>

	        <div class="row">
	          <div class="col-xs-9 col-sm-9 text-left align-self-center">
	            <b class="text-muted" v-text="usuario.username"></b>
	          </div>
	          <div class="col-xs-3 col-sm-3 align-self-center">
	            <button type="button" name="button" class="btn btn-sm btn-block btn-dark" @click.prevent="cambiarUsuario(usuario)">Cambiar username</button>
	          </div>
	        </div>
	        <hr>

	        <div class="row">
	          <div class="col-xs-9 col-sm-9 text-left align-self-center">
	            <b class="text-muted" v-text="usuario.email"></b>
	          </div>
	          <div class="col-xs-3 col-sm-3 align-self-center">
	            <button type="button" name="button" class="btn btn-sm btn-block btn-dark">Cambiar e-mail</button>
	          </div>
	        </div>
	        <hr>

	        <div class="row">
	          <div class="col-xs-9 col-sm-9 text-left align-self-center">
	            <b class="text-muted">******</b>
	          </div>
	          <div class="col-xs-3 col-sm-3 align-self-center">
	            <button type="button" name="button" class="btn btn-sm btn-block btn-dark">Cambiar contraseña</button>
	          </div>
	        </div>
	        <hr>

	        <div class="row">
	          <div class="col-xs-9 col-sm-9 text-left align-self-center">
	            <b class="text-muted">Avatar</b>
	          </div>
	          <div class="col-xs-3 col-sm-3 align-self-center">
	            <button type="button" name="button" class="btn btn-sm btn-block btn-dark">Cambiar avatar</button>
	          </div>
	        </div>

	      </div>

	    </div>

	  </div>

		<!-- modal nombre -->
		<div class="modal fade" id="nombres">
			<div class="modal-dialog">
				<div class="modal-content form-container">
					<div class="modal-header">
						<h3 class="display-6">Actualizar información personal</h3>
					</div>
					<form method="post" id="nombre-apellido" @submit.prevent="actualizarNombre">
					<div class="modal-body">
							<label for="name">Nombre</label>
							<input type="text" class="form-control form-control-sm" name="name" v-model="nuevosNombres.name" required>
							<hr>
							<label for="lastname">Apellido</label>
							<input type="text" class="form-control form-control-sm" name="lastname" v-model="nuevosNombres.lastname" required>
							<hr>
							<span v-for="error in errors" class="text-danger">{{ error }}</span>
					</div>
					<div class="modal-footer">
						<button type="submit" name="button" class="btn btn-sm form-button" form="nombre-apellido">Actualizar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal nombre -->

		<!-- modal usuario -->
		<div class="modal fade" id="usuario">
			<div class="modal-dialog">
				<div class="modal-content form-container">
					<div class="modal-header">
						<h3 class="display-6">Actualizar información personal</h3>
					</div>
					<form method="post" id="username" @submit.prevent="actualizarUsuario">
						<div class="modal-body">
							<label for="username">Usuario</label>
							<input type="text" class="form-control form-control-sm" name="username" v-model="nuevoUsuario.username">
							<span v-for="error in errors" class="text-danger">{{ error }}</span>
						</div>
						<div class="modal-footer">
							<button type="submit" form="username" class="btn btn-sm form-button" name="button">Actualizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal usuario -->

		<!-- modal email -->
		<div class="modal fade" id="email">
			<div class="modal-dialog">
				<div class="modal-content form-container">
					<div class="modal-header">
						<h3 class="display-6">Actualizar información personal</h3>
					</div>
					<form method="post" id="correo" @submit.prevent="actualizarEmail">
						<div class="modal-body">
							<label for="username">Usuario</label>
							<input type="text" class="form-control form-control-sm" name="email" v-model="nuevoUsuario.email">
							<span v-for="error in errors" class="text-danger">{{ error }}</span>
						</div>
						<div class="modal-footer">
							<button type="submit" form="correo" class="btn btn-sm form-button" name="button">Actualizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal email -->
	</div>
</template>


<script type="text/javascript">

	import axios from 'axios';

	export default {

		data () {
			return {
				usuario : [],
				errors	: [],
				nuevosNombres	: {
					'name'			: '',
					'lastname' 	: '',
				},
				nuevoUsuario 	: {
					'username' 	: ''
				},
				nuevoEmail : {
					'email'  : ''
				}
			}
		},

		created: function() {
			this.infoUsuario();
		},

		mounted: function() {

			console.log('Ajustes de Usuario mounted');

		},

		methods: {

			infoUsuario: function() {
				var url = 'usuario/mi-info';
				axios.get(url).then(response => {
					this.usuario = response.data;
				})
			},

			cambiarNombre: function(usuario) {
				this.nuevosNombres.name 		= usuario.name;
				this.nuevosNombres.lastname = usuario.lastname;
				$('#nombres').modal('show');
			},

			cambiarUsuario: function(usuario) {
				this.nuevoUsuario.username 	= usuario.username;
				$('#usuario').modal('show');
			},

			cambiarEmail: function(usuario) {
				this.nuevoEmail.email = usuario.email;
				$('#email').modal('show');
			},

			actualizarNombre: function() {
				var url = 'usuario/cambiarNombre';
				axios.put(url, this.nuevosNombres)
				.then(response => {
					this.infoUsuario();
					this.errors = [];
					$('#nombres').modal('hide');
					toastr.success('Tu información personal ha sido actualizada');
				})
				.catch(error => {
					this.errors = 'Error, por favor ingrese los datos correctamente';
				});
			},

			actualizarUsuario: function() {
				var url = 'usuario/cambiarUsuario';
				axios.put(url, this.nuevoUsuario)
				.then(response => {
					this.infoUsuario();
					this.errors = [];
					$('#usuario').modal('hide');
					toastr.success('Tu información personal ha sido actualizada');
				})
				.catch(error => {
					this.errors = 'El nombre de usuario no es válido';
				});
			},

			actualizarEmail: function() {
				var url = 'usuario/cambiarEmail';
				axios.put(url, this.nuevoEmail)
				.then(response => {
					this.infoUsuario();
					this.errors = [];
					$('#email').modal('hide');
					toastr.success('Tu información personal ha sido actualizada');
				})
				.catch(error => {
					this.errors = 'Error, por favor ingrese los datos correctamente';
				});
			}

		},

	}



</script>
