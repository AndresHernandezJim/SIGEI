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

      focus: function( event, ui ){
          $( "#nombre" ).val( ui.item.nombre);
          return false;
      },
      select: function( event, ui ){
        console.log(ui.item);
        $( "#nom-id" ).val( ui.item.id );
        $.ajax({
          url:'get/user/info',
          method:'post',
          data:{
            '_method':'PATCH',
            'id':ui.item.id,
            '_token':$('[name="_token"]').val()
          },
          success:function(data){
            if(data != ""){
              data = JSON.parse(data);
              $('#tags').val(data.curp);
              $('#ocupacion').val(data.ocupacion);
              $('#tel').val(data.telefono);
              $('[name="local"]').val(data.localidad);
              $('select').material_select();
              $('#old').val(data.edad);
              $('#domici').val(data.domicilio);
              //$('[name="nombre"]').attr('disabled', 'disabled');
              $('[name="existente"]').val(1);
              $('[name="id"]').val(data.id);
            }
          }
        });
        //return false;
      },

    });


 $( "#nombre1" ).autocomplete({
      source: nombre,

      focus: function( event, ui ){
          $( "#nombre" ).val( ui.item.nombre);
          return false;
      },
      select: function( event, ui ){
        console.log(ui.item);
        $( "#nom-id" ).val( ui.item.id );
        $.ajax({
          url:'get/user/info',
          method:'post',
          data:{
            '_method':'PATCH',
            'id':ui.item.id,
            '_token':$('[name="_token"]').val()
          },
          success:function(data){
            if(data != ""){
              data = JSON.parse(data);
              $('[name="curp1"]').val(data.curp);
              $('[name="sexo"]').val(data.sexo);
              $('#ocupacion1').val(data.ocupacion);
              $('[name="telefono1"]').val(data.telefono);
              $('[name="local"]').val(data.localidad);
              $('select').material_select();
              $('[name="edad1"]').val(data.edad);
              $('[name="domicilio1"]').val(data.domicilio);
              //$('[name="nombre1"]').attr('disabled', 'disabled');
              $('[name="existente"]').val(1);
              $('[name="id"]').val(data.id);
              console.log( $('[name="telefono1"]').val(data.telefono));
            }
          }
        });
        //return false;
      },

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
    $( "#localidad1" ).autocomplete({
      source:localidad
    });
    $( "#ocupacion1" ).autocomplete({
      source:ocupacion
    });
     $( "#ocupacion1" ).autocomplete({
      source:ocupacion
    });

    
});