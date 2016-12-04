<?php session_start() ?> 
@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Personas</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Nuevo Paciente</h3></center>
<hr>
<form class="col s12" method="POST" action="/predel/insert/persona">
 {{ csrf_field() }}
 <h5>Datos Personales</h5>
 <div class="row">
	 <div class="input-field col s6 offset-s1">
		 <input id="nombre"  type="text" name="nombre" required>
		 <label id="texto" for="usuario"></i>Nombre(s)</label>
	 </div> 
	<div class="input-field col s1">
 		<p><a id="show-option" title="escribir el nombre de la persona con la siguiente estructura: Nombre(s) y Apellido"><b>?</b></a></p>
 	</div>
	 <div class="input-field col s3">
 		<input id="tags2" type="text" name="curp" >
		<label id="texto" for="tags2"></i>Curp</label>
 	</div> 
 	<div class="input-field col s1">
 		<p><a id="show-option" title="ejemplo: SIHC400128HDFLLR01"><b>?</b></a></p>
 	</div>
 </div>

<div class="row">
 <div class="input-field col s2 offset-s1">
 	<select name="sexo" required>
      <option value="none" disabled selected>Seleccione..</option>
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
    </select>
    <label>Sexo:</label>
 </div>
 <div id="suggestions" class="input-field col s3">
	<input id="ocupacion" type="text" name="ocupacion" class="validate" required>
	<label id="texto" for="tags"></i>Ocupacion</label>
 </div> 
  <div class="input-field col s1 m1 l1">
		 <input type="number" name="edad" required>
		 <label id="texto" for="usuario"></i>Edad</label>
   </div>

 	<div class="input-field col s3">
 		<input type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' maxlength="13" name="telefono" class="validate" required> 
		<label id="texto" for="usuario"></i>Teléfono</label>
 	</div> 
 	<div class="input-field col s1">
 		<p><a id="show-option2" title="ejemplo: (312)315-4545"><b>?</b></a></p>
 	</div>
 </div>

 <div class="row">
 	<div class="input-field col s4 offset-s1">
 		<input type="text" name="npadre" placeholder="">
		<label id="texto" for="usuario"></i>Nombre del Padre</label>
 	</div>
 	<div class="input-field col s4 offset-s1">
 		<input type="text" name="nmadre" placeholder="">
		<label id="texto" for="usuario"></i>Nombre de la Madre</label>
 	</div>
 </div>
<hr>

<h5>Domicilio</h5>

<div class="row">
	<div class="input-field col s3 m3 l3 offset-s1">
		<select name="local" required>
			<option value="" disabled selected>Seleccione</option>
			@foreach ($localidades as $localidad)
                <option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
            @endforeach
		</select>
		<label>Localidad</label>
	</div>
	 <div class="input-field col s7">
	 	<input type="text" name="domicilio" placeholder="" required>
		<label id="texto">Dirección</label>
	 </div>
	 <div class="input-field col s1">
 		<p><a id="show-option" title="Calle #numero Colonia 'Nombre de colonia'"><b>?</b></a></p>
 	 </div>
	 <input type="hidden" name="existente" value="0" required>
	 <input type="hidden" name="id">
</div>

<hr>

<div class="row">
<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	</div>
</div>
</form>

@stop
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var tagso = [
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
<script src="/js/general_prevdel.js"></script>
@stop

