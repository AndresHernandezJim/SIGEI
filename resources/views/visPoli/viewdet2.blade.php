@extends('templates.tsegpub')
@section('content')
		<center><h5>Información del Detenido</h5></center>
		<hr>
	<br>
	<div class="row">
		<center>
			<img src="{{$info->foto}}" height="200px">
		</center>
	</div>
	<br>
	<div class="row">
		<div class="input-field col s5 offset-s1">
			<input readonly="" value="{{$info->apellido." ".$info->nombre}}" id="disabled" type="text"  name="nombre">
	        <label for="disabled">Nombre</label>
		 </div>	 
		 <div class="input-field col s2">
			<input readonly="" value="{{$info->alias}}" id="disabled" type="text"  name="curp">
	        <label for="disabled">Alias</label>
		 </div>	
		 <div class="input-field col s3">
			<input readonly="" value="{{$info->curp}}" id="disabled" type="text"  name="curp">
	        <label for="disabled">CURP</label>
		 </div>	 
		 
	</div>
	<div class="row">
		<div class="input-field col s1 offset-s1">
			<input readonly="" value="{{$info->edad}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Edad</label>
		 </div>	
		<div class="input-field col s2 ">
			<input readonly="" value="{{$info->sexo}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Sexo</label>
		 </div>	
		 
		 <div class="input-field col s2 ">
			<input readonly="" value="{{$info->ocupacion}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Ocupación</label>
		 </div>
		 <div class="input-field col s5 ">
			<input readonly="" value="{{$info->domicilio}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Domicilio</label>
		 </div>
	</div>
	<div  class="row">
		<div class="input-field col s2 offset-s1">
			<input readonly="" value="{{$info->localidad}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Procediente de</label>
		 </div>
		 <div class="input-field col s3 ">
			<input readonly="" value="{{$info->remite}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Remitido por</label>
		 </div>
		 <div class="input-field col s5 ">
			<input readonly="" value="{{$info->causa}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Por motivo de</label>
		 </div>
	</div>
	<div class="row">
		<div class="input-field col s9 offset-s1">
          <input readonly="" id="a"  value="{{$info->pertenencias}}"  name="pertenencias" ></input>
          <label for="a">Pertenencias al momento de la remisión</label>
        </div>
        <div class="input-field col s9 offset-s1">
          <input id="b" readonly="" value="observaciones"  name="observaciones" ></input>
          <label for="b">Observaciones</label>
        </div>
	</div>
	
@stop