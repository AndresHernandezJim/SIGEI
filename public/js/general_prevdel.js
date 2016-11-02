$(document).ready(function(){
  
	  $( "#ocupacion" ).autocomplete({
      source: tagso
    });
    console.log(tagso);
    $( '#ocupacion' ).on('change', function(){
      var prof = $(this).val().trim();
      if($.inArray(prof,tagso) < 0){
        console.log($.inArray(tagso));
        if(!confirm('La profesión no está registrada ¿la quieres registrar?:' + prof)){
          $( '#ocupacion' ).val('');
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

