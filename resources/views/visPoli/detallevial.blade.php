@extends('templates.tsegpub2')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Reporte de suceso vial</a>
    </div>
  </div>
  
@stop
@section('content')
	<div class="row">
			<center><h4>Registro de vialidad</h4></center>
			<hr>
	</div>
	<div class="row">
		<div class="col s10 offset-s1">
			Se presenta el reporte del hecho presentando la emergencia de: {{$reporte->emergencia}}, registrado en la fecha {{$reporte->fecha}}, mostrando que dicho incidente ocurrio a las {{$reporte->hora}} donde se registra lo siguiente:
		</div>
		<br>
		<br><br>
		<div class="col s10 offset-s1">

			<?php
				$tam=sizeof($heridos);
				if($tam!=0){
					echo "Mediante un comunicado a {$reporte->comunicado} se acudío al domicilio {$reporte->direccion} en la localidad de {$reporte->localidad}, en donde se registro un incidente de vialidad que correspondientemente al catálodo de emergencias se denomina como {$reporte->emergencia}, donde se vieron afectadas las siguientes personas.

					<br><br><div class='col s10 offset-s1'>
					<ul>";
					foreach ($heridos as $herido) {
						echo "<li  type='square' > <b>{$herido->nombre}</b>, de {$herido->edad} años de edad, que reside en {$herido->domicilio} de la localidad de {$herido->procedencia}, el cual puede ser localizado en el tel: {$herido->telefono}</li>";
					}
					echo "</div>";
					echo "<div class='col s10'>
						<br>Así mismo se registró la participación del (los) siguientes vehiculo(s)<br>
						</div><div class='col s10 offset-s1'><ul>";
					foreach($vehiculo as $vehiculo){
						echo "<li  type='square'> <b>{$vehiculo->tipo}</b>  marca <b>{$vehiculo->marca}</b> modelo <b>{$vehiculo->modelo} {$vehiculo->anio}</b> {$vehiculo->detalles} con placas <b>{$vehiculo->placas}</b> del estado de <b>{$vehiculo->procedencia}</b>, el cual éra conducido por <b>{$vehiculo->conductor}</b> de {$vehiculo->edad} años de edad, con domicilio en {$vehiculo->domicilio} de la localidad de {$vehiculo->localidad}. ";
							if($vehiculo->liberado!=0){
							echo "<br> <b>Nota:</b> El vehiculo se encuentra actualmente en calidad de consignado, siendo {$vehiculo->ubicacion} la ubicación donde este se resguarda, además se tiene un adeudo de <b>$ {$vehiculo->adeudo} pesos</b> por acciones realizadas para el traslado o consignación del vehiculo. " ;	
							}else
							{
								echo "El vehiculo no se ha consignado y es libre de circular. ";
							}
							if($vehiculo->responsable!=0){
								echo "Se considera que este vehiculo forma parte causal del accidente.";
							}
							else{
								echo "Siendo este vehiculo un involucrado en el accidente sin ser el causante del mismo. ";
							}
						echo "</li>";
					}
					echo "</ul></div>";
				}else{
					echo "Mediante un comunicado a {$reporte->comunicado} se acudío al domicilio {$reporte->direccion} en la localidad de {$reporte->localidad}, en donde se registro un incidente de vialidad que correspondientemente al catálodo de emergencias se denomina como {$reporte->emergencia}, donde se vieron afectadas los siguientes vehiculos";
					echo "<div class='col s10 offset-s1'><ul>";
					foreach($vehiculo as $vehiculo){
						echo "<li  type='square'> <b>{$vehiculo->tipo}</b>  marca <b>{$vehiculo->marca}</b> modelo <b>{$vehiculo->modelo} {$vehiculo->anio}</b> {$vehiculo->detalles} con placas <b>{$vehiculo->placas}</b> del estado de <b>{$vehiculo->procedencia}</b>, el cual éra conducido por <b>{$vehiculo->conductor}</b> de {$vehiculo->edad} años de edad, con domicilio en {$vehiculo->domicilio} de la localidad de {$vehiculo->localidad}. ";
							if($vehiculo->liberado!=0){
							echo "<br> El vehiculo se encuentra actualmente en calidad de consignado, siendo {$vehiculo->ubicacion} la ubicación donde este se resguarda, además se tiene un adeudo de {$vehiculo->adeudo} pesos por acciones realizadas para el vehiculo (grua, corralón, etc)" ;	
							}else
							{
								echo "El vehiculo no se ha consignado y es libre de circular";
							}
						echo "</li>";
					}
					echo "</ul></div>";
				}
			 
			?>
			
		</div>
		<div class="col s10 offset-s1">
			<p>Siendo el oficial <b>{{$reporte->oficial}}</b> quien da fé y veracidad del reporte remitido.</p><br><hr>
		</div>
		<div class="col s3 offset-s8">
			<a href="/consultaincidenciasv" class="btn">Regresar</a>
		</div>
		
	</div>
@stop