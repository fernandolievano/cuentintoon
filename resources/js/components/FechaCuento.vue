<template>
	<span class="badge badge-pill badge-info" v-text="since(cuento.created_at)"></span>
</template>



<script>
	import axios  from 'axios';
	import moment from 'moment';

	moment.locale('es');

	export default {

		props: ['cuento'],

		created: function() {

			this.since();

		}, 

		methods: {

			since: function(d) {
				return moment(d).fromNow();
			}

		}

	}
</script>