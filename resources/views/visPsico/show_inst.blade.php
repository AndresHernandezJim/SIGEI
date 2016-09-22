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
<table class="striped"><thead><tr><th>Nombre</th><th>Domicilio</th><th>Telefono</th><th>Representante</th><th>Opciones</th></thead>
<tbody v-for="institucion in instituciones">
	<tr>
		<td>
			@{{institucion.Nombre}}
		</td>
		<td>
			@{{institucion.Domicilio}}
		</td>
		<td>
			@{{institucion.telefono}}
		</td>
		<td>
			@{{institucion.nombreContacto}}
		</td>
		<td>
		&nbsp
		<a  href="/predel/show/updinst/@{{institucion.idInstitucion}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle aria-hidden="true"></i></a>
		&nbsp&nbsp
		<a  class="waves-effect waves-light btn"><i class="fa fa-trash" aria-hidden="true"></i></a> 
		</td>
	</tr>

</tbody>
</table>

@stop

@section('script')
<script type="text/javascript">

</script>
@stop
