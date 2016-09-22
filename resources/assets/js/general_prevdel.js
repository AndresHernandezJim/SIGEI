$(document).ready(function(){
	$.ajax({
		url:'ruta/laravel',
		type:'get | post',
		data:{
			var1:'valor1',
			var2:'valor2',
			_method:'PATCH | PUT | DELETE',
		},
		success:function(data){
			//Código que se realiza en caso de éxito
		},
		error:function(){
			//Código que se ejecuta en caso de error
		}
	});
});