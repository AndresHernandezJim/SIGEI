@extends('templates.tsegpub2')
@section('content')
<center><h4>Historial de Persona</h4></center>
<hr>
<div class="row">
	<div class="col s8">
		<center><h5>Información personal</h5></center>
		<hr><br>
		<div class="row">
			<div class="input-field col s5">
				<input readonly="" value="{{$personax->apellido." ".$personax->nombre}}" type="text"  name="nombre">
	        	<label >Nombre</label>
			</div>
			<div class="input-field col s5">
				<input readonly="" value="{{$personax->curp}}" type="text"  name="nombre">
	        	<label >CURP</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s2">
				<input readonly="" value="{{$personax->sexo}}" type="text"  name="nombre">
	        	<label >sexo</label>
			</div>
			<div class="input-field col s3">
				<input readonly="" value="{{$personax->ocupacion}}" type="text"  name="nombre">
	        	<label >ocupación</label>
			</div>
			<div class="input-field col s3">
				<input readonly="" value="{{$personax->telefono}}" type="text"  name="nombre">
	        	<label >teléfono</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s3">
				<input readonly="" value="{{$personax->localidad}}" type="text"  name="nombre">
	        	<label >localidad</label>
			</div>
			<div class="input-field col s6">
				<input readonly="" value="{{$personax->domicilio}}" type="text"  name="nombre">
	        	<label >domicilio</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4">
				<a href="/segpub/barandilla/historial" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
			</div>
		</div>
	</div>

	<div class="col s4 card-panel amber lighten-5">
		<center><h5>Detenciones</h5></center>
		<hr>
		<center>Número de detenciones {{$personax->tipo}}</center>
		<hr>
		<div class="row">
		<div class="input-field col s12">
		<table class="striped" id="app"><thead><tr><th>Fecha</th><th>Detalles</th></thead>
		<tbody>
		@foreach ($detenciones as $detencion)
			<tr>
				<td>
					{{$detencion->fecha}}
				</td>
				<td>
					<a href="/segpub/personas/detencion/{{$detencion->id}}" class="waves-effect waves-light btn">Ver</a>
				</td>
			</tr>
		@endforeach
		</tbody>
		</table>
		<br><br>
		{{$detenciones->links()}}
		</div>
		</div>
		<hr>
	</div>
	
</div>
@stop