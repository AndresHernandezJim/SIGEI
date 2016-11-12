<?php session_start() ?> 
@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space"><b>˃</b></span>
      <a class="nav-active">Registro de Institución</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Nueva Institución</h3></center>
<hr>
<form class="col s12" method="POST" action="/prevdel/insert/isntitucion">
 {{ csrf_field() }}
 <div class="row">
	 <div class="input-field col s9 offset-s1">
		 <input type="text" name="nombre" id="nombre">
		 <label id="nombre" for="usuario">Nombre</label>
	 </div>
	 
 </div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s3 m3 l3">
		<select name="local" id="localidad">
			<option value="" disabled selected>Seleccione</option>
			@foreach ($localidades as $localidad)
                <option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
            @endforeach
		</select>
		<label for="localidad">Localidad</label>
	</div>
	 <div class="input-field col s6">
	 	<input type="text" name="domicilio">
		<label id="texto">Domicilio</label>
	 </div>
</div>
<div class="row">
 	<div class="input-field col s3 offset-s1">
 		<input type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Número Telefónico (Formato: (999)999-9999)' name="telefono" class="validate" placeholder="(999)999-9999"> 
		<label id="texto" for="usuario">Teléfono</label>
 	</div> 
 	<div class="input-field col s8 m8 l5">
		<input type="text" id="contacto" name="contacto">
		<label for="contacto">Contacto</label>
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
