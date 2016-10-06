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
		},
});