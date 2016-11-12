<?php session_start(); ?> 
@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space"><b>˃</b></span>
      <a class="nav-active">Instituciones Registradas</a>
    </div>
  </div>
@stop

@section('content')
<h2>Instituciones registradas</h2>
<hr>
<table class="striped"><thead><tr><th>Nombre</th><th>Teléfono</th><th>Información</th><th>Eliminar</th></thead>
<tbody>
@foreach ($instituciones as $institucion)
	<tr>
		<td>
			{{$institucion->nombre}}
		</td>
		<td>
			{{$institucion->telefono}}
		</td>
		
		<td>
		<a  href="/predel/intitucion/info/{{$institucion->id}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle aria-hidden="true"></i></a>
		</td>
		<td>
			<a  v-on:click="borrar({{$institucion->id, $institucion}})" class="waves-effect waves-red btn disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
		@endforeach
	</tr>
</tbody>

</table>
{{$instituciones->links()}}
@stop

@section('script')
<script src="/js/show_inst.js"></script>
@stop
