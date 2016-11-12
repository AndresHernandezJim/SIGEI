@extends('templates.tsegpub')
@section('style')
@stop
@section('content')
	<center>
		<h4>
			Incidencias Viales
		</h4>
	</center>
	<hr>
<form>
{{csrf_field()}}
	<div class="row">
		<div class="input-field col s6 offset-s3">
				<input id="tags" type="text" name="suceso" class="validate" required>
				<label id="texto" for="tags"></i>Suceso</label>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
				<select class="validate" name="sexo" required>
						<option value="" selected disabled>Localidad</option>	
						@foreach($localidades as $localidad)
						<option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
						@endforeach
				</select>
			</div>
			<div class="input-field col s3 m3 l3">
				<input id="tags" type="text" name="ocupacion" class="validate" required>
				<label id="texto" for="tags"></i>Colonia</label>
			</div>
			<div class="input-field col s2 m2 l2">
				<input type="text" name="calle1"  class="validate" required>
				<label id="texto" for="usuario"></i>Calle</label>
			</div>
			<div class="input-field col s2 m2 l2">
				<input type="number" name="numero1" min="1" max="9999" class="validate" required>
				<label id="texto" for="usuario"></i>Número</label>
			</div>
	</div>
	<div class="row">
		<div class="input-field col s2 offset-s1">
			<input type="text" name="hora">
			<label>Hora del suceso</label>
		</div>
		<div class="input-field col s3 ">
			<select name="tipoaviso">
				<option value="" selected disabled>Tipo de Aviso</option>
				<option value="1"> Vía 066</option>
				<option value="2">Llamada Local</option>
				<option value="3">Interna</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="input_field col s4 offset-l1">
			<h6><b>Vehículos involucrados</b></h6>
		</div>
		<a href="#modal1" class="modal-trigger"><i class="fa fa-plus" aria-hidden="true" ></i></a>
			
	</div>
	<div class="row">
		<div class="col s9 offset-s1">
			<table class="bordered striped centered responsive-table">
				<thead>
					<tr>
						<th>Vehículo</th>
						<th width="30">Responsable</th>
					</tr>
				</thead>
				<tbody>
					<tr>  		
						<td>
							aaaa
						</td>
						<td>
							<input class="with-gap" type="radio" id="test3@{{$index}}" name="id_editorial" v-model="id_editorial" value="@{{editorial.id_editorial}}" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	<div class="row">
		<div class="input-field col s">
			
		</div>
	</div>
	<div class="row">
		<div class="input-field col s4  offset-s6">
			<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
		</div>
	</div>
</form>
@include('vispoli.modales')

@stop
@section('script')
<script type="text/javascript">
	
	
	new Vue({
	  //atributos
	  el: 'body', //ambiente de trabajo de vue
	  data: {
	      marca:"",
	      modelo:"",
	      anio:"",
	      serie:"",
	      placas:"",
	      tipo:0,
	      estado:"",
	      asegurado:0,
	      adeudo:"",
	      caracteristicas:"",
	      nombre:"",
	      apellidos:"",
	      curp:"",
	      sexo:"",
	      edad:0,
	      ocupacion:"",
	      domicilio:"",
	      telefono:"",

	  },
	  ready:function(){
	   
	  },
	  methods:{

	  },
});


</script>
@stop