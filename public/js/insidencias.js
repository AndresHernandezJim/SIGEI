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
			 url:'get/incidencia/fecha',
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
				 				'</td><td>' + val.aviso + '</td><td>' + val.emergencia+ '</td><td><a href="/consultaincidenciasp/'+val.id+'"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>');
				 		});
		
					}else{ 
					$( '#efect' ).hide();
					   runEffect2();
					}
				}///
		    });

	});
});