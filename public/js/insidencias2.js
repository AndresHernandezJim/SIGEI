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

		console.log( $('#mes').val().trim() );
		$.ajax({
			 url:'get/incidencia/fechaD',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'mes': $('#mes').val().trim(),
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
				 			$('#tincidencia').append('<tr><td>' + val.fecha + '</td><td>' + val.hora + 
				 				'</td><td>' + val.emergencia + '</td><td>' + val.aviso+ '</td><td><a href="/consultaincidenciaspDD/'+val.id+'"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>');
				 		});
		
					}else{ 
					$( '#efect' ).hide();
					   runEffect2();
					}
				}///
		    });

	});
	$('#enviar2').on('click', function(){
		$.ajax({
			 url:'get/incidencia/fecha2D',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'mes1': $('#mes1').val().trim(),
			 	'dia1': $('#dia1').val().trim(),
			 	'año1': $('#año1').val().trim(),
			 	'mes2': $('#mes2').val().trim(),
			 	'dia2': $('#dia2').val().trim(),
			 	'año2': $('#año2').val().trim(),
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
				 			$('#tincidencia').append('<tr><td>' + val.fecha + '</td><td>' + val.hora + 
				 				'</td><td>' + val.emergencia + '</td><td>' + val.aviso+ '</td><td><a href="/consultaincidenciaspDD/'+val.id+'"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>');
				 		});
		
					}else{ 
					$( '#efect' ).hide();
					   runEffect2();
					}
				}///
		    });

	});
	$('#a1').on('click',function(){
		$.ajax({
					 url:'get/incidencia/fecha3D',
				     method:'post',
			         data:{
					 	'_method':'PATCH',
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
						 			$('#tincidencia').append('<tr><td>' + val.fecha + '</td><td>' + val.hora + 
						 				'</td><td>' + val.emergencia + '</td><td>' + val.aviso+ '</td><td><a href="/consultaincidenciaspDD/'+val.id+'"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>');
						 		});
				
							}else{ 
							$( '#efect' ).hide();
							   runEffect2();
							}
						}///
				    });
	});
	$('#a2').on('click',function(){
		$.ajax({
					 url:'get/incidencia/fecha4D',
				     method:'post',
			         data:{
					 	'_method':'PATCH',
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
						 			$('#tincidencia').append('<tr><td>' + val.fecha + '</td><td>' + val.hora + 
						 				'</td><td>' + val.emergencia + '</td><td>' + val.aviso+ '</td><td><a href="/consultaincidenciaspDD/'+val.id+'"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>');
						 		});
				
							}else{ 
							$( '#efect' ).hide();
							   runEffect2();
							}
						}///
				    });
	});
});