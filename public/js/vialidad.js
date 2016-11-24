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
    $( "#tags2" ).autocomplete({
      source: tags2,
    });
    $( "#nombre2" ).autocomplete({
      source: nombre2,
    });
    $( "#localidad2" ).autocomplete({
      source:localidad2,
    });
    $( "#ocupacion2" ).autocomplete({
      source:ocupacion2
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
    $("#tipo").autocomplete({
      source:tipo
    });
});