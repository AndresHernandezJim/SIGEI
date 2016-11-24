@extends('templates.tsegpub')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Insidencias registradas</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h4>Suceso ocurrido el</h4> <h5>{{$reporte->fecha}}</h5></center>
<hr>
<div class="row">
					
		        <div class="input-field col s1 offset-s1">
		        	<br>
		        	Emergencia
		        </div>
		        <div class = " input-field col s4  offset-s1">
		        	<input readonly="" type="text" name="emergencia" value=" &nbsp;&nbsp;{{$reporte->emergencia}}">
		        </div>
		        <div class="col s1">
		        <br>
		        	<p style="text-align:center;">Hora</p>	
		        </div>
		        <div class = "input-field col s2">
					<input type="time"  name="time" value="{{$reporte->hora}}" readonly="">
				</div>
    		</div>
	    	<div class="row">
				<div class="input-field col s1 offset-s1">
				<br>
					Localidad
					
				</div>
				<div class="input-field col s2 m2 l2">
					<input type="text" name=" local" readonly="" value="&nbsp;&nbsp;&nbsp;&nbsp;{{$reporte->localidad}}">
				</div>
				<div class="input-field col s1 m1 l1">
					<br>
				 	Ubicación
				</div>
				<div class="input-field col s5 m5 l5">
				 	<input type="text" name="num_ext" readonly="" value="{{$reporte->direccion}}">
				</div>
			</div>
			</dir>
			<div class="row">
				<div class="input-field col s1 offset-s1">
					<p style="text-align: center;">Unidad</p>
				</div>
	        	<div class="input-field col s1">
					<input id="unidad" type="text"  value="{{$reporte->unidad}}" readonly="">
	        	</div>
	        	<div class="input-field col s1">
	        		<p >Oficial involucrado</p>
	        	</div>
	        	<div class="input-field col s4 m4 l4">
					<input id="policias" type="text" value="&nbsp;&nbsp;{{$reporte->oficiales}}" readonly="">
	        	</div>
	        	<div class="col s2 ">
	        		Tipo de Atención
	        		<input type="text" value="{{$reporte->aviso}}" readonly="">
	        	</div>
	    	</div>
			<div class="row">
			<div class="col s5 offset-s1">
				<div class="row">
					<div class="col s5 offset-s1">
						
					</div>
				</div>
				<div class="row">
					<table class="bordered highlight  ">
						<thead>
							<tr><td><p style="text-align: center;">Agraviado o Víctima</p></td></tr>
						</thead>
						<tbody >
							@foreach($agraviados as $agra)
							<tr>
								<td>
								{{$agra->persona}} <br>
								sexo: <?php  if(($agra->sexo)==1){ echo "Masculino";}else{echo "Femenino";}?>,&nbsp; &nbsp;Ocupación: {{$agra->ocupacion}}<br>
								Dom: {{$agra->direccion}}, {{$agra->localidad}}<br>
								Teléfono: {{$agra->telefono}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col s5 ">
				<div class="row">
					<div class="col s4 offset-s1">
						
					</div>
				</div>
				<div class="row">
					<table class="bordered highlight">
						<thead>
							<tr><td><p style="text-align: center;">Asegurados</p></td></tr>
						</thead>
						<tbody>
							@foreach($asegurados as $aseg)
							<tr>
								<td>
								Nombre: {{$aseg->persona}} <br>
								sexo: <?php  if(($aseg->sexo)==1){ echo "Masculino";}else{echo "Femenino";}?>,&nbsp;&nbsp;Ocupacion: {{$aseg->ocupacion}}<br>
								Dom: {{$aseg->direccion}}, {{$aseg->localidad}}<br>
								Teléfono: {{$aseg->telefono}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			</div>
	
	        <div class="row">	
	        	<div class="col s2 offset-s9">
	        		<a href="/consultaincidenciasp" class="waves-effect waves-red btn-large cyan darken-3 ">Atras</a>
	        	</div>
	        </div>

@stop