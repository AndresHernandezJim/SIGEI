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
<table class="striped" id="app"><thead><tr><th>Nombre</th><th>Edad</th><th>Ocupación</th></thead>
<tbody v-for="paciente in pacientes">
	<tr>
		<td>
			@{{paciente.Nombre}}
		</td>
		<td>
			@{{paciente.edad}}
		</td>
		<td>
			@{{paciente.Ocupacion}}
		</td>
		<td>
			<a  href="/predel/persona/sesiones/@{{paciente.idPaciente}}" class="waves-effect waves-light btn">Consultar</a>
		</td>
		<td>
			<a  v-on:click="borrar(paciente.idPaciente, paciente)" class="waves-effect waves-light btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
	</tr>

</tbody>
</table>

@stop

@section('script')
<script type="text/javascript">

</script>
@stop