<template>
    <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="bg-light">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <h2 class="display-6 text-center">Ranking</h2>
                </li>
                <li>
                    <b-btn
                    v-b-toggle.lect
                    variant="info"
                    class="btn-block">
                        Mejores Lectores
                    </b-btn>
                    <b-collapse id="lect">
                        <ul class="list-group text-left rank" v-b-scrollspy>
                            <li 
                            v-for="usuario, posicion in usuarios" 
                            :key="usuario.id"
                            class="list-group-item">
                                <b v-text="posicion+1"></b> - {{ usuario.username }} <span class="badge badge-info" v-text="usuario.puntos"></span>
                            </li>
                        </ul>
                    </b-collapse>
                </li>
            </ul>
        </div>    
    </div>
</template>

<script>
import { Collapse } from 'bootstrap-vue/es/components';
import axios from 'axios';

export default {

    mounted: function(){
        console.log('Ranking.vue mounted');
        this.ranking();
    },

    data(){
        return{
            usuarios: [],
        }
    },

    components: {
        Collapse
    },

    methods: {
        ranking: function(){
            var url = '/top';
            axios.get(url).then( response => {
                this.usuarios = response.data;
                console.log('Usuarios traídos');
            })
        }, 
    }
}
</script>

<style>
    .rank{
        position:relative;
        overflow-y:auto;
        height:10.5em;
    } 
</style>


