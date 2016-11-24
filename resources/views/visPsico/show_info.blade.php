<?php session_start() ?> 
@extends('templates.tprevdel2')
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
<div class="row">
<!--=======================================================-->
    <div class="col s8 card-panel amber lighten-5">
        <h5>Datos Personales</h5>
		 <div class="row">
		 <div class="input-field col s1"></div>
			 <div class="input-field col s5">
				 <input readonly="" value="{{$pasiente->nombre}}" type="text" name="nombre">
				 <label id="texto" for="usuario"></i>Nombre Completo</label>
			 </div>
			 <div class="input-field col s3">
		 		<input readonly="" value="{{$pasiente->curp}}"  type="text" name="curp">
				<label id="texto" for="tags2"></i>Curp</label>
		 	</div> 
		 </div>

		<div class="row">
		 	<div class="input-field col s1"></div>
		 	<div class="input-field col s2">
		 		<input readonly="" value="{{$pasiente->sexo}}"  type="text" name="curp">
				<label id="texto" for="tags2"></i>Sexo</label>
		 </div>
		 <div id="suggestions" class="input-field col s3">
			<input readonly="" value="{{$pasiente->id_ocupacion}}" type="text" name="ocupacion">
			<label id="texto" for="tags"></i>Ocupacion</label>
		 </div> 
		  <div class="input-field col s1 m1 l1">
				 <input readonly="" value="{{$pasiente->edad}}" type="text" name="edad">
				 <label id="texto" for="usuario"></i>Edad</label>
		   </div>

		 	<div class="input-field col s3">
		 		<input readonly="" value="{{$pasiente->telefono}}" name="telefono" type="text"> 
				<label id="texto" for="usuario"></i>Teléfono</label>
		 	</div>   
		 </div>
		 <div class="row">
		 	<div class="input-field col s1"></div>
		 	<div class="input-field col s4">
		 		<input readonly="" value="{{$pasiente->padre_tutor}}" type="text" name="npadre">
				<label id="texto" for="usuario"></i>Nombre del Padre</label>
		 	</div>
		 	<div class="input-field col s4 offset-s1">
		 		<input readonly="" value="{{$pasiente->madre}}" type="text" name="nmadre">
				<label id="texto" for="usuario"></i>Nombre de la Madre</label>
		 	</div>
		 </div>
		<hr>

		<h5>Domicilio</h5>

		<div class="row">
			<div class="input-field col s3 m3 l3 offset-s1">
				<input readonly="" value="{{$pasiente->id_lugar}}" type="text" name="nmadre">
				<label id="texto" for="usuario">Localidad</label>
			</div>
			<div class="input-field col s7 m7 l7 offset-s1">
				<input readonly="" value="{{$pasiente->domicilio}}" type="text" name="nmadre">
				<label id="texto" for="usuario">Domicilio</label>
			</div>
		</div>
		<div class="row">
			<div class="row"></div>
			<div class="input-field col s4">
				<a href="/predel/show/pacientes" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
			</div>
			<div class="input-field col s4"></div>
			<div class="input-field col s4">
			<a href="/predel/new/sesiones/{{$pasiente->id_persona}}" class="waves-effect waves-light btn">Nueva Consulta</a>
			</div>
		</div>
		<hr>
    </div>
<!--=======================================================-->
    <div class="col s4 card-panel cyan accent-1">
		<br>
		<h5>Sesiones</h5>
		<form>
		{{ csrf_field() }}
			<div class="row">
				<div class="input-field col s12">
					<table class="striped" id="app"><thead><tr><th>Fecha</th><th>Observaciones</th></thead>
						<tbody>
						@foreach ($sesiones as $sesion)
							<tr>
								<td>
									{{$sesion->fecha}}
								</td>
								<td>
									<a data-id="{{$sesion->id}}" class="waves-effect waves-light btn ver">Ver</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<br><br>
					{{$sesiones->links()}}
				</div>
			</div>
		</form>
		<hr>
    </div>
<!--=======================================================-->
    </div>
    <hr>
    <div id="efect" class="row card-panel cyan accent-1">
     <center><h4>Dato de la Consulta</h4></center>
     <hr>
    	<div class="input-field col s8">
			<textarea id="detalles" readonly="" class="materialize-textarea"></textarea>
    	</div>
    	<div class="col s2 offset-s2">
    		<br><br><br><br>
    		<a id="close" class="waves-effect waves-light btn">ocultar</a>
    	</div>	
    </div>
 <!--=======================================================-->
 <hr>

@stop
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/paciente.js"></script>
@stop
