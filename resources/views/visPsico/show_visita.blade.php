<?php session_start(); ?> 

@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/institucion">Instituciones guardadas</a>
      <span class="space">|</span>
      <a href="/predel/intitucion/info/{{$visita->id}}">Info. Intitucion</a>
      <span class="space">|</span>
      <a class="nav-active">Info. Visita</a>
    </div>
  </div>
@stop

@section('content')
<center><h4>Detalles de Visita</h4></center>
<hr>
<div class="row">
  <div class="input-field col s8"></div>
    <div class="input-field col s3">
      <input  readonly="" value="{{$visita->fecha}}" id="disabled" type="text" class="validate">
      <label>Fecha:</label> 
    </div>
</div>

<div class="row">
  <div class="input-field col s1"></div>
  <div class="input-field col s8">
    <input readonly="" value="{{$visita->id_institucion}}" id="disabled" type="text" class="validate" name="nombre">
        <label for="disabled">Institucion</label>
   </div>  
</div>
<div class="row">
  <div class="input-field col s1"></div>
  <div class="input-field col s8">
    <textarea readonly="" name="observ" class="materialize-textarea" >{{$visita->observaciones}}</textarea>
      <label for="textarea1">Observaciones</label>
    </div>
</div>
<hr>
<div class="row">
<div class="input-field col s9"></div>
  <div class="input-field col s3">
  <a href="/predel/intitucion/info/{{$visita->id}}" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Regresar</a>
  </div>
</div>
@stop