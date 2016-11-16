<?php session_start(); ?> 

@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/pacientes">Listado de Pacientes</a>
      <span class="space">|</span>
      <a href="/predel/paciente/info/{{$PasNom->id}}">Sesiones del Paciente</a>
      <span class="space">|</span>
      <a class="nav-active">Nueva Consulta</a>
    </div>
  </div>
@stop

@section('content')
<center><h4>Nueva Consulta</h4></center>
<hr>
<form class="col s12" method="POST" action="/predel/sesion/{{$PasNom->id}}">
{{ csrf_field() }}
<div class="row">
  <div class="input-field col s8"></div>
    <div class="input-field col s3">
      <input  readonly="" name="fecha" value="{{DATE('Y-m-d')}}" id="disabled" type="text" class="validate">
      <label>Fecha:</label> 
    </div>
</div>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<input readonly="" value="{{$PasNom->nombre}}" id="disabled" type="text" class="validate" name="nombre">
        <label for="disabled">Nombre</label>
	 </div>	 
</div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<textarea name="observ" class="materialize-textarea"  length="250"></textarea>
      <label for="textarea1">Observaciones</label>
    </div>
</div>
<input type="hidden" name="psicologo" value="{{session()->get('Psicologo')->id_usuario}}">
<hr>
<div class="row">
<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	</div>
</div>
</form>

@stop