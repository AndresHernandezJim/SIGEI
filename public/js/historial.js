$(document).ready(function(){

	 $( "#tags" ).autocomplete({
      source: tags,
    });
    $( '#tags' ).on('change', function(){
      var curp = $(this).val().trim();
      if($.inArray(curp,tags) < 0){
        console.log($.inArray(tags));
        if(!confirm('no se encuentra la curp:' + curp)){
          $( '#tags' ).val('');
        }
      }
    });

    $( "#nombre" ).autocomplete({
      source: nombre
    });
    $( '#nombre' ).on('change', function(){
      var dato = $(this).val().trim();
      if($.inArray(dato,nombre) < 0){
        console.log($.inArray(nombre));
        if(!confirm('no se encuentra el nombre:' + dato)){
          $( '#nombre' ).val('');
        }
      }
    });

    $( "#apellidos" ).autocomplete({
      source: apellido
    });
});