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
      source: nombre
    });
    $( "#apellidos" ).autocomplete({
      source: apellido
    });
    $( "#localidad" ).autocomplete({
      source:localidad
    });
    $( "#ocupacion" ).autocomplete({
      source:ocupacion
    });
     $( "#tags1" ).autocomplete({
      source: tags,
    });
    $( "#nombre1" ).autocomplete({
      source: nombre
    });
    $( "#apellidos1" ).autocomplete({
      source: apellido
    });
    $( "#localidad1" ).autocomplete({
      source:localidad
    });
    $( "#ocupacion1" ).autocomplete({
      source:ocupacion
    });
});