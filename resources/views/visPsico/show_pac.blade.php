<?php session_start(); ?> 

@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Listado de Pacientes</a>
    </div>
  </div>
@stop
 
@section('content')
<table class="striped" id="app"><thead><tr><th>Apellido</th><th>Nombre</th><th>Información</th><th>Eliminar</th></thead>
<tbody v-for="paciente in pacientes">
	<tr>
		<td>
			@{{paciente.apellido}}
		</td>
		<td>
			@{{paciente.nombre}}
		</td>
		<td>
			<a  href="/predel/paciente/info/@{{paciente.id}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle" aria-hidden="true"></i>
</a>
		</td>
		<td>
			<a  v-on:click="borrar(paciente.id, paciente)" class="waves-effect waves-light btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
	</tr>

</tbody>
</table>

@stop

@section('script')
<script src="/js/show_pac.js"></script>
@stop