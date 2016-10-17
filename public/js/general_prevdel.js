$(document).ready(function(){
	  $( "#tags" ).autocomplete({
      source: tags
    });
    $( '#tags' ).on('change', function(){
      var prof = $(this).val().trim();
      if($.inArray(prof,tags) < 0){
        console.log($.inArray(tags));
        if(!confirm('La ocupacion no se encuentra registrada,¿deseas agregrla?')){
          $( '#tags' ).val('');
        }
      }
    });
     $( "#tags2" ).autocomplete({
      source: tags2
    });
    $( '#tags2' ).on('change', function(){
      var curp = $(this).val().trim();
      if($.inArray(curp,tags) < 0){
        console.log($.inArray(tagsc));
        if(!confirm('Curp no encontrada:' + curp)){
          $( '#tags' ).val('');
        }
      }
    });
}); 

