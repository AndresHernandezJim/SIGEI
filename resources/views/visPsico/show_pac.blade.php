<?php session_start(); ?> 

@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s8">
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Listado de Pacientes</a>
    </div>
  </div>
@stop
 
@section('content')
<h2>Pacientes registrados</h2>
<hr>
<table class="striped" id="app"><thead><tr><th>Nombre</th><th>Información</th><th>Eliminar</th></thead>
<tbody >
@foreach ($pasientes as $pasiente)
	<tr>
		<td>
			{{$pasiente->nombre}}
		</td>
		<td>
			<a  href="/predel/paciente/info/{{$pasiente->id}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle" aria-hidden="true"></i>
</a>
		<td>
			<a  v-on:click="borrar({{$pasiente->id, $pasiente}})" class="waves-effect waves-red btn disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
		</td>
@endforeach
		<!--Esta parte la voy a consultar con victor -->
		<!--td v-for="paciente in pacientes">
			<a  v-on:click="borrar(pasiente.id, paciente)" class="waves-effect waves-red btn disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td-->
	</tr>
</tbody>
</table>
{{$pasientes->links()}}
@stop

@section('script')
<script src="/js/show_pac.js"></script>
@stop