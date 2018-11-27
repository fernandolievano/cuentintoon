<template lang="html">

  <div class="row justify-content-center">

    <div class="col-sm-12 col-xs-12">
      <paginate name="cuentos" :list="cuentos" :per="3">
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-6 col-xs-12" v-for="cuento in paginated('cuentos')">
            <div class="card card-cuento">
              <div class="card-body text-center">
                <button
                  type="button" class="btn btn-sm btn-light btn-circle float-right"
                  name="fav" title="Añadir a favoritos" @click.prevent="favorito"
                  >
                  <i class="far fa-star"></i>
                </button>
                <hr>
                <img :src="'img/'+cuento.cover" alt="portada" class="card-img cover mx-auto d-block">
                <h3 class="display-6" v-text="cuento.titulo"></h3>
                <div class="card-content">
                  <p v-text="cuento.descripcion"></p>
                </div>
                <hr>
                <div class="card-info">
                  <span class="badge badge-dark" v-text="cuento.nivel" title="Nivel de dificultad"></span>
                  <span class="badge badge-dark" v-text="cuento.autor" title="Autor"></span>
                  <span class="badge badge-dark">
                    <i v-text="since(cuento.created_at)" title="Publicado"></i>
                  </span>
                </div>
              </div>
              <div class="card-footer card-actions text-center">
                <a :href="leerUrl+cuento.id" class="btn btn-sm card-link" title="Leer Cuento">
                  <i class="fas fa-book-open"></i>
                </a>
                <a :href="'cuento/'+cuento.id+'/leer'" class="btn btn-sm card-link" v-tooltip="messageLeer">
                  Leer con vue
                </a>
              </div>
            </div>
          </div>
        </div>
      </paginate>
    </div>

    <div class="col-sm-12 col-xs-12">
      <nav class="nav justify-content-center">
        <paginate-links
        for="cuentos"
        :classes="{'ul': 'pagination', 'li': 'page-item', 'a': 'page-link'}">
        </paginate-links>
      </nav>
    </div>

  </div>

</template>



<script>

import axios  from 'axios';
import moment from 'moment';
import { VTooltip, VPopover, VClosePopover } from 'v-tooltip'

Vue.directive('tooltip', VTooltip)
Vue.directive('close-popover', VClosePopover)
Vue.component('v-popover', VPopover)

moment.locale('es');

export default {
  created: function(){
    this.index();
    this.since();
  },

  mounted: function(){

    console.log('Cuentos mounted')

  },

  data() {

    return {
      cuentos : [],
      paginate: ['cuentos'],
      leerUrl : '/pagina/leer/',
      fav: false,
      messageLeer: 'Leer el cuento'
    }

  },

  methods: {

    index: function(){
      var url = 'todosLosCuentos';
      axios.get(url)
      .then(response => {
        this.cuentos = response.data;
        console.log('Cuentos traídos');
      })
    },

    since: function(date){
      return moment(date).fromNow();
    },

    favorito: function(){
      this.fav = true;
      if (this.fav) {
        alert('Añadido a mis favoritos')
      }
    },

  }
}

</script>
