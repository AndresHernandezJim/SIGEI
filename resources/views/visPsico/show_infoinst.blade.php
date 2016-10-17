<?php session_start() ?> 
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
      <a>Info. Intitucion</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Detalles de Institución</h3></center>
<hr>
 <div class="row">
	 <div class="input-field col s9 offset-s1">
		 <input readonly="" value="{{$instituto->nombre}}" type="text" name="nombre" id="nombre">
		 <label id="nombre" for="usuario">Nombre</label>
	 </div>
	 
 </div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s3 m3 l3">
		<input readonly=""d value="{{$instituto->id_lugar}}" type="text" name="nombre" id="nombre">
		 <label id="nombre" for="usuario">Localidad</label>
	</div>
	 <div class="input-field col s6">
	 	<input readonly="" value="{{$instituto->domicilio}}" type="text" name="domicilio">
		<label id="texto">Domicilio</label>
	 </div>
</div>
<div class="row">
 	<div class="input-field col s3 offset-s1">
 		<input readonly="" value="{{$instituto->telefono}}" type='tel' > 
		<label id="texto" for="usuario">Teléfono</label>
 	</div> 
 	<div class="input-field col s8 m8 l5">
		<input readonly="" value="{{$instituto->contacto}}" type="text" id="contacto" name="contacto">
		<label for="contacto">Contacto</label>
	</div>  
 </div>

<hr>
<h5>Visitas</h5>
<div class="row">
<div class="input-field col s12">
<table class="striped" id="app"><thead><tr><th>Fecha</th><th>Observaciones</th></thead>
<tbody v-for="visita in visitas">
	<tr>
		<td>
			@{{visita.fecha}}
		</td>
		<td>
			<a href="/predel/intitucion/visita/@{{visita.id}}" class="waves-effect waves-light btn">Ver</a>
		</td>
	</tr>
</tbody>
</table>
</div>
</div>
<hr>

<div class="row">
<div class="input-field col s4">
	<a href="/predel/show/institucion" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>

<div class="input-field col s4"></div>
	<div class="input-field col s4">
		<a href="/predel/new/visitas/{{$instituto->id_institucion}}" class="waves-effect waves-light btn">Nueva Consulta</a>
	</div>	
</div>
@stop

@section('script')
<script type="text/javascript">
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
		el: 'body',
		data: {
			visitas:[],
		},
		ready: function(){
			
			this.getVisitas();
		},
		methods:{
			getVisitas: function(){
				
				this.$http.get('/predel/ajax/visitas/{{$instituto->id_institucion}}').then(function(response){
					this.$set('visitas', response.data);
				});
			}
		},
	});
</script>
@stop
