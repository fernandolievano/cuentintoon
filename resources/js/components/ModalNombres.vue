<template lang="html">

  <div class="modal fade" id="nombres">
    <div class="modal-dialog">
      <div class="modal-content form-container">
        <div class="modal-header">
          <h3 class="display-6">Actualizar información personal</h3>
        </div>
        <form method="post" id="nombre-apellido" @submit.prevent="actualizarNombre(nuevosNombres.id)">
        <div class="modal-body">
            <label for="name">Nombre</label>
            <input type="text" class="form-control form-control-sm" name="name" v-model="nuevosNombres.name">
            <hr>
            <label for="lastname">Apellido</label>
            <input type="text" class="form-control form-control-sm" name="lastname" v-model="nuevosNombres.lastname">
            <hr>
            <span v-for="error in errors" class="text-danger">@{{ error }}</span>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-sm form-button" form="nombre-apellido">Cambiar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  mounted: function() {
    console.log('ModalNombres mounted')
  }
}

</script>
