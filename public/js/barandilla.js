Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
	el: 'body',
	data:{
	},
	ready: function(){
	},
	methods:{
		borrar: function(id, detenido){

			var confirmar = confirm("Confirmar acción, ¿Esta seguro?");

			var confirmar = confirm("¿Está seguro de liberar al detenido?");

			if (confirmar) {
				this.$http.post('/segpub/ajax/liberar', {'id_rep':id}).then(function(response){
					Materialize.toast('Persona liberada', 3500);
					location.reload();
			});
			}else{}

			

		}
	}
});