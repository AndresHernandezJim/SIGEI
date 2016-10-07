<?php session_start() ?> 
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
	 <a class="nav-active">Sesiones del Paciente</a>
  </div>
@stop

@section('content')
<center><h3>Detalles del Paciente</h3></center>
<hr>
 <h5>Datos Personales</h5>
 <div class="row">
 <div class="input-field col s1"></div>
	 <div class="input-field col s3">
		 <input disabled value="{{$pasiente->apellido." ".$pasiente->nombre}}" type="text" name="nombre">
		 <label id="texto" for="usuario"></i>Nombre Completo</label>
	 </div>
	 <div class="input-field col s3">
 		<input disabled value="{{$pasiente->curp}}"  type="text" name="curp">
		<label id="texto" for="tags2"></i>Curp</label>
 	</div> 
 </div>

<div class="row">
 	<div class="input-field col s1"></div>
 	<div class="input-field col s2">
 		<input disabled value="{{$pasiente->sexo}}"  type="text" name="curp">
		<label id="texto" for="tags2"></i>Sexo</label>
 </div>
 <div id="suggestions" class="input-field col s3">
	<input disabled value="{{$pasiente->id_ocupacion}}" type="text" name="ocupacion">
	<label id="texto" for="tags"></i>Ocupacion</label>
 </div> 
  <div class="input-field col s1 m1 l1">
		 <input disabled value="{{$pasiente->edad}}" type="text" name="edad">
		 <label id="texto" for="usuario"></i>Edad</label>
   </div>

 	<div class="input-field col s3">
 		<input disabled value="{{$pasiente->telefono}}" name="telefono" type="text"> 
		<label id="texto" for="usuario"></i>Teléfono</label>
 	</div>   
 </div>
 <div class="row">
 	<div class="input-field col s1"></div>
 	<div class="input-field col s4">
 		<input disabled value="{{$pasiente->padre_tutor}}" type="text" name="npadre">
		<label id="texto" for="usuario"></i>Nombre del Padre</label>
 	</div>
 	<div class="input-field col s4 offset-s1">
 		<input disabled value="{{$pasiente->madre}}" type="text" name="nmadre">
		<label id="texto" for="usuario"></i>Nombre de la Madre</label>
 	</div>
 </div>
<hr>

<h5>Domicilio</h5>

<div class="row">
	<div class="input-field col s3 m3 l3 offset-s1">
		<input disabled value="{{$pasiente->id_lugar}}" type="text" name="nmadre">
		<label id="texto" for="usuario">Localidad</label>
	</div>
	<div class="input-field col s7 m7 l7 offset-s1">
		<input disabled value="{{$pasiente->domicilio}}" type="text" name="nmadre">
		<label id="texto" for="usuario">Domicilio</label>
	</div>
</div>

<hr>
<br>
<br>
<h5>Sesiones</h5>
<div class="row">
<div class="input-field col s12">
<table class="striped" id="app"><thead><tr><th>Nombre</th><th>Fecha</th><th>Observaciones</th></thead>
<tbody v-for="sesion in sesiones">
	<tr>
		<td>
			{{$pasiente->apellido." ".$pasiente->nombre}}
		</td>
		<td>
			@{{sesion.fecha}}
		</td>
		<td>
			<a href="/predel/personas/sesion/@{{sesion.id}}" class="waves-effect waves-light btn">Ver</a>
		</td>
	</tr>
</tbody>
</table>
</div>
</div>
<hr>
<div class="row">
	<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<a href="/predel/new/sesiones/{{$pasiente->id_persona}}" class="waves-effect waves-light btn">Nueva Consulta</a>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
		el: 'body',
		data: {
			sesiones:[],
		},
		ready: function(){
			this.getSesiones();
		},
		methods:{
			getSesiones: function(){
				
				this.$http.get('/predel/ajax/sesiones/{{$pasiente->id_persona}}').then(function(response){
					this.$set('sesiones', response.data);
				});
			}
		},
	});
</script>
@stop