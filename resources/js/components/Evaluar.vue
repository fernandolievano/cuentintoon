<template lang="html">
  <div>
    <form method="post">
      <div class="modal-body">
        <ul class="list-unstyled text-left">
          <div class="form-group" v-for="pregunta in preguntas">
            <h6 class="display-5" v-text="pregunta.pregunta"></h6>
            <div class="form-check" v-for="respuesta in pregunta.respuestas">
              <input type="radio" name="" value="">
            </div>
          </div>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm form-button" name="button">Enviar Respuestas</button>
      </div>
    </form>
  </div>
</template>



<script>
import axios from 'axios'

export default {
  props: ['preguntas', 'prueba'],

  mounted: function(){
    console.log('Evaluar.vue mounted');
  },

}
</script>
