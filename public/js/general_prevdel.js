$(document).ready(function(){

  //funcion para los iconos de ayuda
    $( function() {
        $( "#show-option" ).tooltip({
        show: {
          effect: "slideDown",
          delay: 250
        }
      });
         $( "#show-option2" ).tooltip({
        show: {
          effect: "slideDown",
          delay: 250
        }
      });
         $( "#hide-option" ).tooltip({
      hide: {
        effect: "explode",
        delay: 250
      }
    });
    });
     $('select').material_select();
 
$( "#nombre" ).autocomplete({
      source: nombre,
      focus: function( event, ui ){
          $( "#nombre" ).val( ui.item.nombre);
          return false;
      },
      select: function( event, ui ){
        console.log(ui.item);
        $( "#nom-id" ).val( ui.item.id );
        $.ajax({
          url:'get/user/infop',
          method:'post',
          data:{
            '_method':'PATCH',
            'id':ui.item.id,
            '_token':$('[name="_token"]').val()
          },
          success:function(data){
            if(data != ""){
              data = JSON.parse(data);
              $('[name="curp"]').val(data.curp);
              $('[name="sexo"]').val(data.sexo);
              $('[name="ocupacion"]').val(data.ocupacion);
              $('[name="telefono"]').val(data.telefono);
              $('[name="npadre"]').val(data.padre_tutor);
              $('[name="nmadre"]').val(data.madre);
              $('[name="local"]').val(data.localidad);
              $('select').material_select();
              $('[name="edad"]').val(data.edad);  
              $('[name="domicilio"]').val(data.domicilio);
              $('[name="nombre"]').attr('disabled', 'disabled');
              $('[name="sexo"]').attr('disabled', 'disabled');
              $('[name="existente"]').val(1);
              $('[name="id"]').val(data.id);
            }
          }
        });
        //return false;
      },

    });

 $( "#ocupacion" ).autocomplete({
      source: tagso,
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
}); 

