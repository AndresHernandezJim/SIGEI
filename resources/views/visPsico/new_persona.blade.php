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
 <div class="input-field col s1"></div>
	 <div class="input-field col s3">
		 <input type="text" name="nombre">
		 <label id="texto" for="usuario"></i>Nombre(s)</label>
	 </div>
	 <div class="input-field col s3">
		 <input type="text" name="apellidos">
		 <label id="texto" for="usuario"></i>Apellidos</label>
	 </div>	 
	 <div class="input-field col s3">
 		<input id="tags2" type="text" name="curp">
		<label id="texto" for="tags2"></i>Curp</label>
 	</div> 
 </div>

<div class="row">
 	<div class="input-field col s1"></div>
 	<div class="input-field col s2">
 	<select name="sexo">
      <option value="none" disabled selected>Seleccione..</option>
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
    </select>
    <label>Sexo:</label>
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
 </div>
 <div class="row">
 	<div class="input-field col s1"></div>
 	<div class="input-field col s4">
 		<input type="text" name="npadre">
		<label id="texto" for="usuario"></i>Nombre del Padre</label>
 	</div>
 	<div class="input-field col s4 offset-s1">
 		<input type="text" name="nmadre">
		<label id="texto" for="usuario"></i>Nombre de la Madre</label>
 	</div>
 </div>
<hr>

<h5>Domicilio</h5>

<div class="row">
	<div class="input-field col s3 m3 l3 offset-s1">
		<select name="local">
			<option value="" disabled selected>Seleccione</option>
			@foreach ($localidades as $localidad)
                <option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
            @endforeach
		</select>
		<label>Localidad</label>
	</div>
	 <div class="input-field col s3">
	 	<input type="text" name="colonia">
		<label id="texto"></i>Colonia</label>
	 </div>
	 <div class="input-field col s4">
	 	<input type="text" name="calle">
		<label id="texto"></i>Calle</label>
	 </div>
	 <div class="input-field col s1">
	 	<input type="text" name="num_ext">
		<label id="texto"></i>Número</label>
	 </div>
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
<script src="/js/general_prevdel.js"></script>
<script type="text/javascript">
	var tags = [
@foreach($ocupaciones as $val)
"{{$val->nombre}}",
@endforeach

];

</script>
@stop