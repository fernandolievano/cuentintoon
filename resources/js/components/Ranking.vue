<template>
    <div class="col-md-1 col-sm-12 col-xs-12">
        <ul class="nav flex-column">
            <li class="nav-item">
                <h1 class="display-5">Ranking</h1>
            </li>
            <li>
                <b-btn
                v-b-toggle.lect
                variant="info">
                    Top Lectores
                </b-btn>
                <b-collapse id="lect">
                    <h3 class="display-6">Top 5</h3>
                </b-collapse>
            </li>
            <hr>
            <li>
                <b-btn
                v-b-toggle.escr
                variant="info">
                    Top Escritores
                </b-btn>
                <b-collapse id="escr">
                    <h3 class="display-6">Top 5</h3>
                </b-collapse>
            </li>
        </ul>
        
    </div>
</template>

<script>
import { Collapse } from 'bootstrap-vue/es/components';

export default {

    mounted: function(){
        console.log('Ranking.vue mounted')
    },

    components: {
        Collapse
    }
}
</script>

