<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-xs-12">
        <h2 class="display-5" v-text="cuento.titulo"  id="textoPagina"></h2>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-2 col-xs-2 align-self-center">
        <ul class="list-unstyled text-muted text-left">
          <li>
            <h6 class="display-6">Nivel de dificultad</h6>
            <b v-text="cuento.nivel"></b>
          </li><hr>
          <li>
            <h6 class="display-6">Autor del cuento</h6>
            <b v-text="cuento.autor"></b>
          </li><hr>
          <li>
            <h6 class="display-6">Publicado por</h6>
            <b v-text="creador.username"></b>
            <i v-text="since(cuento.created_at)"></i>
          </li>
        </ul>
      </div>
      <div class="col-sm-10 col-xs-10">
        <paginate name="paginas" :list="paginas" :per="1" tag="div" ref="paginator">
            <div v-for="pagina in paginated('paginas')" class="text-center">
                <div v-html="pagina.contenido"></div>
            </div>
        </paginate>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-4 col-xs-4 align-self-center">
        <paginate-links
         for="paginas"
         :simple="{
          prev: 'Anterior',
          next: 'Siguiente'
         }"
         :classes="{
         'ul': 'pagination',
         'li': 'page-item',
         'a' : 'page-link'
         }"
         @change="enfoquePagina"
         ></paginate-links>
      </div>
      <div class="col-sm-8 col-xs-8 align-self-center text-right">
        <button type="button" class="btn btn-sm btn-success" @click.prevent="quizz"> Gana puntos de lector </button>
        <!-- modal quizz -->

        <div class="modal fade" id="quizzCuento">
          <div class="modal-dialog modal-lg">
            <div class="modal-content form-container text-left">
              <div class="modal-header">
                <h3 class="display-5">Responde segun lo que leiste</h3>
              </div>
              <form @submit.prevent="evaluar()">
                <div class="modal-body">
                  <div class="text-left">
                    <ul class="list-unstyled">
                      <div class="form-group" v-for="pregunta in preguntas">
                        <h6 class="display-6" v-text="pregunta.pregunta"></h6>
                        <div class="form-check" v-for="respuesta in pregunta.respuestas" :name="pregunta.id">
                          <input type="radio" class="form-check-input" :name="respuesta[pregunta.id]" :value="respuesta.id" v-model="respuestas[respuesta.id]">
                          <label :for="respuesta[pregunta.id]" v-text="respuesta.respuesta"></label>
                        </div>
                      </div>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm form-button">Enviar Respuestas</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- modal quizz -->
      </div>
    </div>
  </div>
</template>

<script>

import axios from  'axios';
import moment from 'moment';

export default {

  props: ['cuento','creador'],

  data(){
    return {
      cuentoID: this.cuento.id,
      paginas : [],
      paginate: ['paginas'],
      preguntas: [],
      pruebaID: '' ,
      respuestas: []
    }
  },

  mounted: function(){
    console.log('Paginas.vue mounted');
    this.pages();
    this.since();
  },

  methods: {
    pages: function(){
      var url = '/get-pages/'+this.cuentoID;
      axios.get(url)
      .then(response => {
        this.paginas = response.data;
        console.log('Paginas traídas')
      })
    },

    since: function(d){
      return moment(d).fromNow();
    },

    quizz: function(){
      if (this.$refs.paginator) {

        var current = this.$refs.paginator.currentPage + 1;

        if (this.$refs.paginator.lastPage == current) {
          var url = '/quizzes/random/'+this.cuentoID;
          axios.get(url).then(response => {
            this.preguntas = response.data;
            this.pruebaID = this.preguntas[0].prueba_id;
            console.log(this.pruebaID)
          })
          $('#quizzCuento').modal('show');
        }
        else{
          swal({
            title: 'No has terminado de leer el cuento',
            text: 'Para realizar el quizz debes terminar de leer el cuento',
            type: 'error',
            confirmButtonText: 'Entendido'
          })
        }

      }
      
    },

    enfoquePagina: function(toPage, fromPage){
      var pag = $('#textoPagina').offset().top;
      $(window).scrollTop(pag);
    },

    evaluar: function(){
      $('#quizzCuento').modal('hide');
      swal({
        title: 'Felicidades',
        text: 'Aprobaste la prueba y sumaste 50 puntos de lector',
        type: 'success',
        confirmButtonText: 'Reclamar puntos'
      });

    }
  }

}

</script>
