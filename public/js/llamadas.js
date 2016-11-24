$(document).ready(function(){
	
	$( '#efect' ).hide();
	$( '#error' ).hide();
	function runEffect(){
	  var options = {};
	  $( '#efect' ).show( "blind", options, 500);
	};
	function runEffect2(){
	  var options = {};
	  $( '#error' ).show( "blind", options, 500);
	};

	$('#enviar').on('click', function(){
			
			if ( $('#mes2').val().trim() == 0 || $('#dia2').val().trim() == 0  ) {
				var fecha1 = $('#anio').val().trim() + '-' + $('#mes').val().trim() + '-' + $('#dia').val().trim();
				console.log(fecha1);

			$.ajax({
			 url:'get/llamada/fecha1',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'fecha': fecha1,
			 	'_token':$('[name="_token"]').val()
			 },
				success:function(data){
				 	console.log(data);
				 	console.log(data.length);
				 	if(data.length > 2){
				 		$( '#error' ).hide();
				 		$( '#app tbody > tr' ).remove();
				 		runEffect();
				 		data = JSON.parse(data);
				 		console.log(data);
				 		$.each(data, function(index,val){
				 			$('#tllamadas').append('<tr><td>' + val.nombre + '</td><td>' + val.cantidad);
				 		});
		
					}else{ 
					$( '#efect' ).hide();
					   runEffect2();
					}
				}///
		    });

			}else{
				var fecha1 = $('#anio').val().trim() + '-' + $('#mes').val().trim() + '-' + $('#dia').val().trim();
				var fecha2 = $('#anio2').val().trim() + '-' + $('#mes2').val().trim() + '-' + $('#dia2').val().trim();
				console.log(fecha1);
				console.log(fecha2);

			$.ajax({
			 url:'get/llamada/fecha2',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'fecha': fecha1,
			 	'fecha2': fecha2,
			 	'_token':$('[name="_token"]').val()
			 },
				success:function(data){
				 	console.log(data.length);
				 	if(data.length > 2){
				 		$( '#error' ).hide();
				 		$( '#app tbody > tr' ).remove();
				 		runEffect();
				 		data = JSON.parse(data);
				 		console.log(data);
				 		$.each(data, function(index,val){
				 			$('#tllamadas').append('<tr><td>' + val.nombre + '</td><td>' + val.cantidad);
				 		});
		
					}else{ 
					$( '#efect' ).hide();
					   runEffect2();
					}
				}
		    });
			};
	        
			
			//console.log(fecha2);
	});
	

});