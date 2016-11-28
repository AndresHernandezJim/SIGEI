@extends('templates.tsegpub2')
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
<center><h4>Reporte de incidencia de Seguridad Pública</h4></center>
<hr>
<div class="row">
	<div class="col s10 offset-s1">
		<p style=”text-align: justify;”>Reporte de incidencia de Seguridad Pública ocurrido el {{$reporte->fecha}}  a las {{$reporte->hora}}, donde mediante un comunicado {{$reporte->aviso}}, se acudió al la dirección {{$reporte->direccion}} de la localidad de {{$reporte->localidad}} para atender una emergencia catalogada como {{$reporte->emergencia}}, a la cual acudieron la unidad {{$reporte->unidad}}, en la cual el(los) oficial(es) {{$reporte->oficiales}} se encontraban abordo. Donde se registra lo siguiente:</p>
	
		<?php  
			$agra=sizeof($agraviados);
			$aseg=sizeof($asegurados);
		if($agra!=0 && $aseg==0){
			echo "<p style='text-align: justify;'>Al arribar al lugar mencionado anteriormente se encontró a las siguientes personas en calidad de afectados </p>";
			echo "<div class='col s10 offset-s1'><ul>";
				foreach ($agraviados as $agraviados) {
					echo "<li>";
					echo "{$agraviados->persona} de {$agraviados->edad} años de edad, {$agraviados->ocupacion},  con domicilio en {$agraviados->direccion} de la localidad de {$agraviados->localidad}, con Teléfono: {$agraviados->telefono}";
					echo "</li>";
				}
			echo "</ul></div><br><br><br><br>";

			echo "<div class='row'>Cabe señalar que no se registró ninguna persona como causante del incidente</div>";
			//solo hubo agraviado
		}else{
			if($agra==0 && $aseg!=0){
				//solo se registraron asegurados
			echo "<p style='text-align: justify;'> Al arribar al lugar se encontraron a las siguientes personas, las cuales quedaron en calidad de consignadas hasta clarificar su participacion en la incidencia</p>";
			}
			else{
				//están los 2
				echo "Al arribar al lugar mencionado anteriormente se encontró a las siguientes personas en calidad de afectados";
				echo "<div class='col s10 offset-s1'><ul>";
				foreach ($agraviados as $agraviados) {
					echo "<li>";
					echo "{$agraviados->persona} de {$agraviados->edad} años de edad, {$agraviados->ocupacion},  con domicilio en {$agraviados->direccion} de la localidad de {$agraviados->localidad}, con Teléfono: {$agraviados->telefono}";
					echo "</li><br>";
				}
				echo "</ul></div><br><br><br><br><br>";
				echo "<br>Además se encontraron las siguientes personas, a las cuales se les considera como responsables de la incidencia";
				echo "<div class='col s10 offset-s1'><ul>";
				foreach ($asegurados as $asegurados) {
					echo "<li>";
					echo "{$asegurados->persona} de {$asegurados->edad} años de edad, {$asegurados->ocupacion},  con domicilio en {$asegurados->direccion} de la localidad de {$asegurados->localidad}, con Teléfono: {$asegurados->telefono}";
					echo "</li><br>";
				}
			echo "</ul></div><br><br><br><br>";
			}}?>

			
			</div>
	
	        <div class="row">	
	        	<div class="col s2 offset-s9">
	        		<a href="/consultaincidenciasp" class="waves-effect waves-red btn-large cyan darken-3 ">Atras</a>
	        	</div>
	        </div>

@stop