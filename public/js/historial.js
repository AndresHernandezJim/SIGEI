$(document).ready(function(){
  //console.log(nombre);
  $( '#nombre' ).val('');
  $( '#tags' ).val('');
  $( '#apod' ).val('');
  $( '#tel' ).val('');
  $( '#apod' ).val('');
  $( '#old' ).val('');
  $( '#dom' ).val('');
  $('[name="sexo"]').val('');
 $('[name="local"]').val('');
  /*$( '#tel' ).val('');
  $( '#tel' ).val('');
  $( '#tel' ).val('');*/


	
    $( "#show-option" ).tooltip({
        show: {
          effect: "slideDown",
          delay: 250
        }
      });

   $('select').material_select();

    $( '#tags' ).on('change', function(){
      var curp = $(this).val().trim();
      if($.inArray(curp,tags) < 0){
        console.log($.inArray(tags));
        if(!confirm('no se encuentra la curp:' + curp)){
          $( '#tags' ).val('');
        }
      }
    });

    $( "#ocup" ).autocomplete({
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
              $('[name="curp"]').val(data.curp);
              $('[name="sexo"]').val(data.sexo);
              $('[name="ocupacion"]').val(data.ocupacion);
              $('[name="alias"]').val(data.alias);
              $('[name="telefono"]').val(data.telefono);
              $('[name="local"]').val(data.localidad);
              $('select').material_select();
              $('[name="edad"]').val(data.edad);
              $('[name="domicilio"]').val(data.domicilio);
              $('[name="nombre"]').attr('disabled', 'disabled');
            }
          }
        });
        //return false;
      },

    });
    
    /*$( '#nombre' ).on('change', function(){
      var dato = $(this).val().trim();
      if($.inArray(dato,nombre) < 0){
        console.log($.inArray(nombre));
        if(!confirm('no se encuentra el nombre:' + dato)){
          $( '#nombre' ).val('');
        }
      }
    });*/

});