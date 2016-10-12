<?php session_start(); ?> 
@extends('templates.tprevdel')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space"><b>˃</b></span>
      <a class="nav-active">Instituciones guardadas</a>
    </div>
  </div>
@stop

@section('content')
<h2>Instituciones registradas</h2>
<hr>
@{{ $institucion.links() }}
<table class="striped"><thead><tr><th>Nombre</th><th>Telefono</th><th>Información</th></thead>
<tbody v-for="institucion in instituciones">
	<tr>
		<td>
			@{{institucion.nombre}}
		</td>
		<td>
			@{{institucion.telefono}}
		</td>
		
		<td>
		&nbsp
		<a  href="/predel/intitucion/info/@{{institucion.id}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle aria-hidden="true"></i></a>
		</td>
	</tr>
</tbody>

</table>

@stop

@section('script')
<script src="/js/show_inst.js"></script>
@stop
