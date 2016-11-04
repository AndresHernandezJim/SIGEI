$(document).ready(function(){

	 $( "#tags" ).autocomplete({
      source: tags,
    });
   

    $( '#tags' ).on('change', function(){
      var hecho = $(this).val().trim();
      if($.inArray(hecho,tags) < 0){
        console.log($.inArray(tags));
        if(!confirm('no se encuentra la emergencia:' + hecho)){
          $( '#tags' ).val('');
        }
      }
    });
});