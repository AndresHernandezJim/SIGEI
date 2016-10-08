<?php session_start() ?> 
@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space"><b>˃</b></span>
      <a class="nav-active">Registro de Intitución</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Detalles de Institución</h3></center>
<hr>
<form class="col s12" method="POST" action="/prevdel/insert/isntitucion">
 {{ csrf_field() }}
 <div class="row">
	 <div class="input-field col s9 offset-s1">
		 <input disabled value="{{$instituto->nombre}}" type="text" name="nombre" id="nombre">
		 <label id="nombre" for="usuario">Nombre</label>
	 </div>
	 
 </div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s3 m3 l3">
		<input disabled value="{{$instituto->nombre}}" type="text" name="nombre" id="nombre">
		 <label id="nombre" for="usuario">Localidad</label>
	</div>
	 <div class="input-field col s6">
	 	<input disabled value="{{$instituto->domicilio}}" type="text" name="domicilio">
		<label id="texto">Domicilio</label>
	 </div>
</div>
<div class="row">
 	<div class="input-field col s3 offset-s1">
 		<input disabled value="{{$instituto->telefono}}" type='tel' > 
		<label id="texto" for="usuario">Teléfono</label>
 	</div> 
 	<div class="input-field col s8 m8 l5">
		<input disabled value="{{$instituto->contacto}}" type="text" id="contacto" name="contacto">
		<label for="contacto">Contacto</label>
	</div>  
 </div>

<hr>
<h5>Visitas</h5>
<div class="row">
<div class="input-field col s12">
<table class="striped" id="app"><thead><tr><th>Fecha</th><th>Observaciones</th></thead>
<tbody v-for="sesion in sesiones">
	<tr>
		<td>
			@{{sesion.fecha}}
		</td>
		<td>
			<a href="/predel/personas/sesion/@{{sesion.id}}" class="waves-effect waves-light btn">Ver</a>
		</td>
	</tr>
</tbody>
</table>
</div>
</div>
<hr>

<div class="row">
<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar Visita &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	</div>	
</div>
</form>
@stop
