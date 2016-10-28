Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
	el: 'body',
	data:{
		pacientes:[],
	},

	ready: function(){
		//alert("Vue True!!");
		this.getPaciente();
	},
	methods:{
		getPaciente: function(){
				this.$http.get('/predel/ajax/paciente').then(function(response){
					this.$set('pacientes', response.data);	
				});
			},

			borrar: function(id, pasiente){
				var confirmar = confirm("Seguro desea eliminar a este paciente?");
				if (confirmar) {
					var conf2 = confirm("Muy seguro?");
					if(conf2){
						
					this.$http.post('/predel/ajax/delpac', {'id_pas':id}).then(function(response){
						this.pacientes.$remove(pasiente);
						Materialize.toast('El Paciente a sido borrado', 3500);
						location.reload();
					});
				}else{}
				}else{
					console.log("cuidado!!");
				}	
				
			}


		},
});