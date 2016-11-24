$(document).ready(function(){
    $( '#plac' ).val('');
    $('#modelo').val('');
	$('#anii').val('');
	$('#tipo').val('');
	$('#estado').val('');
	$('#detalles').val('');
	$('#liberado').val('');
	$('#ubicacion').val('');
	$('#adeudo').val('');
	$('#placas').val('');
	$( "#plac" ).autocomplete({
      source:placas,
    });
    $( '#efect' ).hide();

	function runEffect(){
	  var options = {};
	  $( '#efect' ).show( "blind", options, 500);
	};

	$('#enviar').on('click', function(){
		$.ajax({
			url:'get/auto/placa',
			method:'post',
			data:{
			    '_method':'PATCH',
			    'placa':$('#plac').val().trim(),
			    '_token':$('[name="_token"]').val()
			},
		   	success:function(data){
		   		console.log(data);
		   		if(data != ""){
			   		data = JSON.parse(data);
			   		$('#liberar').show()
			   		//$('#feclibdiv').hide()
			   		$('#modelo').val(data.modelo);
			   		$('#anii').val(data.anii);
			   		$('#tipo').val(data.tipo);
			   		$('#estado').val(data.estado);
			   		$('#detalles').val(data.detalles);
			   		$('#liberado').val(data.liberado);
			   		$('#ubicacion').val(data.ubicacion);
			   		$('#adeudo').val(data.adeudo);
			   		$('#placas').val(data.placas);
			   		$('#regsitro').val(data.registrado);
			   		$('#idv').val(data.id_vehiculo);
			   		$('#feclibe').val('---');
			   		if(data.liberado == "Liberado"){
			   			$('#liberar').hide();
			   			//$('#feclibdiv').show("blind", options, 500);
			   			$('#feclibe').val(data.liberado1);
			   		}
	
			   		// $('#liberar').css('disabled');
			   		runEffect();

			   	}////
			   	else
			   		alert('Las placas ingresadas no coinciden con ninguna registrada')

		   	}
		   	
	    });

	    
	});

	$('#liberar').on('click', function(){
		var confirmar = confirm("¿Liberar Vehiculo?");
		if(confirmar){
			$.ajax({
			 url:'get/auto/liberar',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'placa':$('#placas').val().trim(),
			 	'id':$('#idv').val().trim(),
			 	'_token':$('[name="_token"]').val()
			 },
				success:function(data){
				 	console.log(data);
				 	if(data != ""){
				 		data = JSON.parse(data);
				 		$('#liberado').val(data.liberado);
						$('#adeudo').val(data.adeudo);
						$('#feclibe').val(data.liberadoo);
						$('#liberar').hide();
				 	}
				}
		    });
		}
	});	    	

});


