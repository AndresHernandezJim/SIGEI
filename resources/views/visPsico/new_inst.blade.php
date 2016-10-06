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
<center><h3>Nueva Institución</h3></center>
<hr>
<form action="/predel/instituto"  method="POST" >
{{ csrf_field() }}
<div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="nombre">
		 <label id="texto" for="usuario">Nombre</label>
	 </div>	 
 </div>

<div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="domicilio">
		 <label id="texto" for="usuario">Domicilio</label>
	 </div>	 
 </div>

 <div class="row">
 
 	
	<div class="input-field col s1"></div>
	 <div class="input-field col s3">
		 <input  type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' name=' (Format: (999)999-9999)'>
		 <label id="texto" for="usuario">Telefono</label>
	 </div>	
	 <div class="input-field col s7">
		 <input type="text" name="contacto">
		 <label id="texto" for="usuario">Contacto</label>
	 </div>	  
 </div>
 <div class="row">
 	<div class="input-field col s3">
 		<select>
 			<option value="" disabled selected>aa</option>
 		</select>
 		<label>Localidad</label>
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
	<script type="text/javascript"> alert("hola")</script>
@end