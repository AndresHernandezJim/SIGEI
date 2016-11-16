
$(document).ready(function(){
    $( function() {
        $( "#show-option" ).tooltip({
        show: {
          effect: "slideDown",
          delay: 250
        }
      });
      });
   $( "#tags" ).autocomplete({
      source: tags,
    });
    $( "#nombre" ).autocomplete({
      source: nombre,
    });
    $( "#localidad" ).autocomplete({
      source:localidad,
    });
    $( "#ocupacion" ).autocomplete({
      source:ocupacion
    });
    $("#marca").autocomplete({
      source:marca,
      });
    $("#modelo").autocomplete({
      source:modelo,
    });
    $("#estado").autocomplete({
      source:estado,
    });
});