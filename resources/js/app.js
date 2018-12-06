
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.toastr = require('toastr');
window.VuePaginate = require('vue-paginate');
window.swal = require('sweetalert2');
import { Scrollspy } from 'bootstrap-vue/es/directives';




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Scrollspy);
Vue.use(VuePaginate);
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('fecha-cuento', require('./components/FechaCuento.vue'));
Vue.component('ajustes-usuario', require('./components/AjustesUsuario.vue'));
Vue.component('cuentos', require('./components/Cuentos.vue'));
Vue.component('paginas', require('./components/Paginas.vue'));
Vue.component('ranking', require('./components/Ranking.vue'));

window.onload = function() {

	const app = new Vue({

		el: '#app'

	});

}
