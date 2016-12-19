Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
	el: 'body',
	data:{
		instituciones:[],
	},
	ready: function(){
		this.getInstitucion();
	},
	methods:{
		getInstitucion: function(){
			this.$http.get('/predel/ajax/showinst').then(function(response){
				this.$set('instituciones', response.data);
			});
		},
		borrar: function(id, institucion){
			var confirmar = confirm("¿Seguro quiere eliminar la Institución?");
			if (confirmar) {
				this.$http.post('/predel/ajax/delins', {'id_ins':id}).then(function(response){
					//this.instituciones.$remove(institucion);
					Materialize.toast('La institucion a sido borrada', 3500);
					location.reload();
			});
			}else{}

			

		}
	}
});