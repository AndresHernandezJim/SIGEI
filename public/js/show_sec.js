Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
		el: 'body',
		data: {
			sesiones:[],
		},
		ready: function(){
			this.getSesiones();
		},
		methods:{
			getSesiones: function(){
				
				this.$http.get('/predel/ajax/sesiones/{{$pasiente->id_persona}}').then(function(response){
					this.$set('sesiones', response.data);
				});
			}
		},
	});