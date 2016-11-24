$(document).ready(function(){
	$( '#efect' ).hide();
	function runEffect(){
	  var options = {};
	  $( '#efect' ).show( "blind", options, 500);
	};
	function runEffect2(){
	  var options = {};
	  $( '#efect' ).hide( "blind", options, 500);
	};
	
	$('.ver').on('click', function(){
		console.log($(this).attr('data-id'));
			$.ajax({
			 url:'/predel/intitucion/visita/',
		     method:'post',
	         data:{
			 	'_method':'PATCH',
			 	'id':$(this).attr('data-id'),
			 	'_token':$('[name="_token"]').val()
			 },
				success:function(data){
				 	console.log(data);
				 	if(data != ""){
				 		runEffect();
				 		data = JSON.parse(data);
				 		$('#detalles').val(data.observaciones);	
				 	}
				}
		    });
	});	

	$('#close').on('click', function(){
		runEffect2();
	});    	
});