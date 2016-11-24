<?php session_start() ?> 
@extends('templates.tprevdel2')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/institucion">Instituciones registradas</a>
      <span class="space">|</span>
      <a>Info. Intitucion</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Detalles de Institución</h3></center>
<hr>
<div class="row">
<!--=======================================================-->
     <div class="col s8 amber lighten-5">
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
 		<div class="row">
			<div class="input-field col s4">
				<a href="/predel/show/institucion" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
			</div>

			<div class="input-field col s4"></div>
				<div class="input-field col s4">
					<a href="/predel/new/visitas/{{$instituto->id_institucion}}" class="waves-effect waves-light btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Visita</a>
				</div>	
			</div>
    	</div>
<!--=======================================================-->
    <div class="col s4 amber lighten-3">
    	<h5>Visitas</h5>
    	<form>
    	{{ csrf_field() }}
    		<div class="row">
				<div class="input-field col s12">
					<table class="striped" id="app"><thead><tr><th>Fecha</th><th>Observaciones</th></thead>
						<tbody>
							@foreach ($visitas as $visita)
								<tr>
									<td>
										{{$visita->fecha}}
									</td>
									<td>
										<a data-id="{{$visita->id}}" class="waves-effect waves-light btn ver">Ver</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$visitas->links()}}
				</div>
			</div>  	
    	</form>
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
<script src="/js/instituto.js"></script>
@stop
