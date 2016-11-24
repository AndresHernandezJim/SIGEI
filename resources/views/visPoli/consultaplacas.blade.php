@extends('templates.tsegpub')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Vehiculo</a>
    </div>
  </div>
  
@stop
@section('content')
 <div class="row">
 	<div class="row">
 		<div class="col s12">
 			<div class="row">
 				<div class="col s3 offset-s2" >
 					<input type="text" name="Placas">
 					<label>Número de placa</label>
 				</div>
 				<div class="col s3">
 					<input type="text" name="fecha">
 					<label>Fecha</label>
 				</div>
 				<div class="col s1 offset-s1">
 				<br>
 					<a href="#!" class="btn">Buscar</a>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

@stop