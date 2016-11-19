@extends('templates.tsegpub')
@section('styles')
	<style>
          .thumb {
            height: 150px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
@stop
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Barandillas</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h4>REGISTRO DE INGRESO A BARANDILLA</h4></center>
<hr>
	
    @if(Session::has('error'))
       <center><p>No es posible registrar al individuo, ya se encuentra detenido</p></center>
    @endif
<form method="POST" action="/savebarandilla"  enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="center" >
	            	<h6>Fotografía</h6>
				      	<output id="list"></output>
				      	<br />
				        <input type="file" id="files" name="files[]"  class="validate"  required/>			      
    	</div>
	</div>
	<div class="row">
			<div class="input-field col s6 m4 l4 offset-s1 offset-m1 offset-l1">
				<input type="text" name="nombre" id="nombre" class="validate" minlength="3" required>
				<label>Nombre completo</label>
			</div>
			<div class="input-field col s1">
 				<p><a id="show-option" title="Nombre(s) y Apellidos"><b>?</b></a></p>
 			</div>
			<div class="input-field col s3 m4 l4">
				<input type="text" id="tags" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99">
				<label>CURP</label>
			</div>
			<div class="input-field col s1">
 				<p><a id="show-option" title="ejemplo: SIHC400128HDFLLR01"><b>?</b></a></p>
 			</div>
	</div>
	<div class="row">
		<div class="input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
			<select class="validate" name="sexo" required>
				<option value="" selected disabled>Sexo</option>
				<option value="1"> Masculino</option>
				<option value="2"> Femenino</option>
			</select>
		</div>
		<div  class="input-field col s3 m3 l3">
			<input id="ocup" type="text" name="ocupacion" class="validate" required>
			<label id="texto" for="tags"></i>Ocupación</label>
		 </div>
		 <div  class="input-field col s2 m2 l2">
			<input id="apod" type="text" name="alias" class="validate">
			<label id="texto" for="tags"></i>Apodo</label>
		 </div> 
  		<div class="input-field col s1 m1 l1">
		 	<input type="text" id="old" name="edad" min="5" max="120" class="validate" required>
		 	<label id="texto" for="usuario"></i>Edad</label>
   		</div>
 		<div class="input-field col s2 m2 l2">
 			<input id='tel' type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' name="telefono" class="validate" placeholder="(999)999-9999" required> 
			<label id="texto" for="usuario"></i>Teléfono</label>
 		</div>
	</div>
	<div class="row">
		<div class=" col s3 m3 l3 offset-s1 offset-m1 offset-l1">
			<select name="local" class="validate" required>
				<option value="" disabled selected>Localidad</option>
				@foreach ($localidades as $localidad)
	                <option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
	            @endforeach
			</select>
			<label>Localidad</label>
		</div>
	
		<div class="input-field col s6 m6 l6">
			<input id="dom" type="text" name="domicilio" class="validate" placeholder="Calle #numero Colonia Nombre de colonia" required>
			<label id="texto">Domicilio</label>
		</div>
	</div>
	<div class="row">
	    <div class = "input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
	        <input id="unidadremite" type="text" class="validate" name ="remite" required>
	        <label for="unidadremite">Oficial que Remite</label>
	    </div>
	    <div class = "input-field col s8 m8 l8">
	        <input id="lugararresto" type="text" class="validate" name ="lugara" required>
	        <label for="lugararresto">Lugar del arresto</label>
	    </div>
	</div>
	<div class="row">
	    <div class = "input-field col s5 offset-s1 offset-m1 offset-l1">
	    	<select name="causa" class="browser-default" required>
	    		<option value="" disabled selected>Motivo del Arresto</option>
	    		@foreach($emergencias as $emergencias)
	    		<option value="{{$emergencias['id']}}">{{$emergencias['nombre']}}</option>
	    		@endforeach
	    	</select>
	    </div>
	    <div class = "input-field col s5 m5 l5">
	        <input id="aseguramiento" type="text" class="validate" name ="aseguramiento">
	        <label for="aseguramiento">Aseguramiento</label>
	    </div>
	</div>
	<div class="row">
		<div class = "input-field col s7 offset-s1 offset-m1 offset-l1">
	        <input id="pertenencias" type="text" class="validate" name ="pertenencias" required>
	        <label for="pertenencias">Pertenencias al momento del arresto</label>
	    </div>
	    
	    <div class = "input-field col s3 m3 l3">
	        <select id="destino" class="validate" name="destino" required>
	        	<option value="" selected disabled>Destino</option>
	            <option value="1">Ministerio Público</option>
				<option value="2">Separos Preventivos</option>
	        </select>
	    </div>
	</div>
	<div class="row">
		<div class = "input-field col s10 m10 l10 offset-s1 offset-m1 offset-l1">
			<b>OBSERVACIONES:</b>
	    </div>
		<div class = "input-field col s10 m10 l10 offset-s1 offset-m1 offset-l1">
			<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" required></textarea>
	    </div>
	</div>
    <div class="row">
		<div class="input-field col s4 offset-s7">
			<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar Ingreso &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
		</div>
	</div>
</form>
@stop
@section('script')
	<script>
		
              function archivo(evt) {
                  var files = evt.target.files; 
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var tags = [
	@foreach($ocupaciones as $val)
	"{{$val->nombre}}",
	@endforeach
];

var nombre = [
	@foreach($personas as $val)
	{
		label:"{{$val->nombre}}",
		id:"{{$val->id}}",
	},
	@endforeach
];


</script>
<script src="/js/historial.js"></script>
@stop