@extends('templates.tdir')
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
			<input readonly="" value="{{$info->nombre}}" id="disabled" type="text"  name="nombre">
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
	        <label for="disabled">Procedente de</label>
		 </div>
		 <div class="input-field col s3 ">
			<input readonly="" value="{{$info->remite}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Remitido por</label>
		 </div>
		 <div class="input-field col s5 ">
			<input readonly="" value="{{$info->causa}}" id="disabled" type="text"  name="sexo">
	        <label for="disabled">Causa de arresto</label>
		 </div>
	</div>
	<div class="row">
		<div class="input-field col s4 offset-s1">
			<input  readonly value="{{$info->destino}}" type="text" name="">
			<label  >Ubicación</label>
		</div>
		<div class="input-field col s6">
			<input  readonly type="text" value="{{$info->lugar_arresto}}" name="">
			<label>Lugar donde se suscitó el arresto</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s5 offset-s1">
          <input readonly="" value="{{$info->pertenencias}}" id="disabled" type="text"></input>
          <label for="disabled">Pertenencias al momento de la remisión</label>
        </div>
        <div class="input-field col s5 ">
          <input id="b" readonly="" value="{{$info->observaciones}}"  type="text" ></input>
          <label for="b">Observaciones</label>
        </div>
	</div>
	<div class="row">
		<div class="input-field col s10 offset-s1">
			<input  readonly type="text" name="" value="{{$info->aseguramiento}}">
			<label>Elementos decomisados</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s4 offset-s1">
				<a href="/segpub/barandilla/detperxD/{{$info->id}}" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
			</div>
	</div>

	
@stop