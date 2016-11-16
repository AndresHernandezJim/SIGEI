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
      <a class="nav-active">Ver sesion</a>
    </div>
  </div>
@stop

@section('content')
<center><h4>Dato de la Consulta</h4></center>
<hr>
<div class="row">
  <div class="input-field col s8"></div>
    <div class="input-field col s3">
      <input  readonly="" name="fecha" value="{{$sesion->fecha}}" id="disabled" type="text" class="validate">
      <label>Fecha:</label> 
    </div>
</div>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s6">
		<input readonly="" value="{{$PasNom->nombre}}" id="disabled" type="text" class="validate" name="nombre">
        <label for="disabled">Nombre</label>
	 </div>	 
</div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<textarea readonly="" class="materialize-textarea">{{$sesion->detalle}}</textarea>
      <label for="textarea1">Observaciones</label>
    </div>
</div>

<div class="row">
<div class="input-field col s1"></div>
<a href="/predel/paciente/info/{{$PasNom->id}}" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Regresar</a>
</div>
@stop