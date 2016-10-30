<?php session_start() ?> 
@extends('templates.tsegpub')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Incidencias de Seguridad Pública</a>
    </div>
  </div>
  
@stop
@section('content')

<div class="container">
    <h3 class="center-align">REGISTRO DE INCIDENCIAS SP</h3>
    <form action ="/sp" method="POST" class="card-panel form-acceso">
        <div class="row">
	        <div class = "col s2 m2 l2">
	        	<br>
	        	<b>HECHO:</b>
	        </div>
	        <div class = "col s10 m10 l10">

	        	<select id="nombre_emergencia" class="browser-default" name="nombre_emergencia" required>
	        		<option value="" disabled selected>Seleccione</option>
	        		@foreach ($emergencias as $emergencias)
                        <option value="{{$emergencias->id}}">{{$emergencias->nombre}}</option>
                    @endforeach
	        	</select>
	        </div>
	    </div>
	    <div class="row">
			<div class = "col s3 m3 l3">
				<br>
				<b>HORA Y FECHA:</b>
			</div>
			<div class = "input-field col s2 m2 l2">
				<input type="text" class="validate" name="hora" required>
				<label id="texto">Hora</label>
			</div>
			<div class = "input-field col s2 m2 l2">
				<input type="text" class="validate" name="dia" required>
				<label id="texto">Día</label>
			</div>
			<div class = "input-field col s3 m3 l3">
				<input type="text" class="validate" name="mes" required>
				<label id="texto">Mes</label>
			</div>
			<div class = "input-field col s2 m2 l2">
				<input type="text" class="validate" name="anio" required>
				<label id="texto">Año</label>
			</div>
		</div>
	    <div class="row">
	    	<div class = "col s1 m1 l1">
				<br>
				<b>LUGAR:</b>
			</div>
			<div class="input-field col s4 m4 l4 offset-s1">
				<select name="local" class="validate" required>
					<option value="" disabled selected>&nbsp;&nbsp; Localidad</option>
					@foreach ($localidades as $localidad)
		                <option value="{{$localidad['id_localidad']}}">&nbsp;&nbsp;&nbsp;{{$localidad['nombre']}}</option>
		            @endforeach
				</select>
			</div>
			<div class="input-field col s3 m3 l3">
				<input type="text" name="colonia" class="validate" required>
				<label id="texto">Colonia</label>
			</div>
			<div class="input-field col s3 3m l3">
			 	<input type="text" name="calle" class="validate" required>
				<label id="texto">Calle</label>
			</div>
			<div class="input-field col s1 m1 l1">
			 	<input type="text" name="num_ext" class="validate" required>
				<label id="texto">#</label>
			</div>
		</div>
	    <div class="row">
	    	<div class = "col s4 m4 l4">
				<br>
				<b>AGRAVIADO O VÍCTIMA:</b>
			</div>
			<div class="input-field col s8 m8 l8">
				<input type="text" name="victima" class="validate" required>
				<label id="texto">Víctima</label>
			</div>
		</div>
		<div class="row">
	    	<div class = "col s3 m3 l3">
				<br>
				<b>CONSIGNADOS:</b>
			</div>
			<div class="input-field col s9 m9 l9">
				<input type="text" name="consignados" class="validate" required>
				<label id="texto">Consignados</label>
			</div>
		</div>
		<div class="row">
	    	<div class = "col s3 m3 l3">
				<br>
				<b>ASEGURAMIENTO:</b>
			</div>
			<div class="input-field col s9 m9 l9">
				<input type="text" name="aseguramiento" class="validate" required>
				<label id="texto">Aseguramiento</label>
			</div>
		</div>
        <div class="row">
        	<div class="input-field col s2 m2 l2">
				<input id="unidad" type="text" class="validate" name="unidad" required>
				<label id="texto">Unidad</label>
        	</div>
        	<div class="input-field col s6 m6 l6">
				<input id="policias" type="text" class="validate" name="policias" required>
				<label id="texto">Policías</label>
        	</div>
        	<div class="col s4 m4 l4">
        		Tipo de Atención:
        		<select id="tipoatencion" class="browser-default" required>
				    <option value="emergencias066">Llamada al 066</option>
				    <option value="llamadalocal">Llamada a Dirección</option>
				    <option value="patrullaje">Patrullaje</option>
				    <option value="apoyo">Apoyo</option>
				</select>
        	</div>
        </div>
        <div class="row">
	        <b>OBSERVACIONES:</b>
        	<div class="col s12 m12">
        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" required></textarea>
        	</div>
        </div>
        <div class="row">
        	<div class="col s12 m12">
        		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">REGISTRAR&nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        	</div>
        </div>
    </form>
</div>



@stop
@section('script')
<script type="text/javascript">
	$(function(){
		$('#auto').on('keyup',function(){
			$('[name="nombre_emergencia"]').html('');
			nombre = $(this).val().trim();
			if(nombre.length > 2){
				$.ajax({
					type:'POST',
					url:"{{url('/getemergencia.html')}}",
					data:{
						_token:"{{csrf_token()}}",
						_method:"PATCH",
						nombre:nombre
					},
					success:function(data){
						if(data.trim() != ""){
							data = JSON.parse(data);
							$.each(data,function(i,v){
								$('[name="nombre_emergencia"]').append('<option value="' + v.idEmergencia + '">' + v.Nombre + '</option>');
							});
						}
					},
				});
			}
		});
	});
</script>
@stop