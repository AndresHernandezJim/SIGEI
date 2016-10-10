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
@section('content')
<center><h3>Detenido</h3></center>
<hr>
<form method="POST" action="/savebarandilla" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="center" >
	            	<h6>Fotografía</h6>
				      	<output id="list"></output>
				      	<br />
				        <input type="file" id="files" name="files[]" />			      
    	</div>
	</div>
	<div class="row">
			<div class="input-field col s3  offset-s1">
				<input type="text" name="nombre" id="nombre">
				<label>Nombre</label>
			</div>
			<div class="input-field col s3 ">
				<input id="apellidos" type="text" name="apellidos">
				<label>Apellidos</label>
			</div>
			<div class="input-field col s3 ">
				<input type="text" name="curp">
				<label>CURP</label>
			</div>
	</div>
	<div class="row">
		<div class="input-field col s2 offset-s1">
			<select>
				<option value="" selected disabled> Seleccione</option>
				<option value="1"> Masculino</option>
				<option value="2"> Femenino</option>
			</select>
			<label>Sexo</label>
		</div>
		<div id="suggestions" class="input-field col s3">
			<input id="tags" type="text" name="ocupacion">
			<label id="texto" for="tags"></i>Ocupacion</label>
		 </div> 
  		<div class="input-field col s1 m1 l1">
		 	<input type="number" name="edad">
		 	<label id="texto" for="usuario"></i>Edad</label>
   		</div>
 		<div class="input-field col s3">
 			<input type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' name="telefono" class="validate" placeholder="(999)999-9999"> 
			<label id="texto" for="usuario"></i>Teléfono</label>
 		</div>   
 		<div class="input-field col s3">
 			<input type="hidden" name="foto" value="images/fotos/{{ Session::get('image') }}">
 		</div>
	</div>
	<div class="row">
		<div class="input-field col s3 offset-s1">
			<select name="local">
				<option value="" disabled selected>Seleccione</option>
				@foreach ($localidades as $localidad)
	                <option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
	            @endforeach
			</select>
			<label>Localidad</label>
		</div>
		 <div class="input-field col s2">
		 	<input type="text" name="colonia">
			<label id="texto">Colonia</label>
		 </div>
		 <div class="input-field col s3">
		 	<input type="text" name="calle">
			<label id="texto">Calle</label>
		 </div>
		 <div class="input-field col s1">
		 	<input type="text" name="num_ext">
			<label id="texto">Número</label>
		 </div>
	</div>
	<div class="row">
		<div class="input-field col s5 offset-s1 ">
			<input type="text" name="causa">
			<label>Motivo de la detención</label>
		</div>
		<div class="input-field col s4 ">
			<input type="text" name="remite">
			<label>Remíte:</label>
		</div>
	</div>
	 <div class="row">
        <div class="input-field col s9 offset-s1">
          <textarea id="textarea1" class="materialize-textarea" name="pertenencias"></textarea>
          <label for="textarea1">Pertenencias</label>
        </div>
      </div>
      <div class="row">
		
			<div class="input-field col s4 offset-s7">
				<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
			</div>
		</div>
</form>
@stop
@section('script')
	 <script>function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
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
@stop