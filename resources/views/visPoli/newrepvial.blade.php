@extends('templates.tsegpub')
@section('style')
@stop
@section('content')
<div class="row">
	<center>
		<h4>
			INCIDENCIA VIAL
		</h4>
		<hr>
	</center>
	
</div>
<form action="/segpub/incidenciavial" method="POST">
	{{csrf_field()}}
	<div class="row">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][marca]" value="@{{vehiculo.marca}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][modelo]" value="@{{vehiculo.modelo}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][anio]" value="@{{vehiculo.anio}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][serie]" value="@{{vehiculo.serie}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][placas]" value="@{{vehiculo.placas}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][tipo]" value="@{{vehiculo.tipo}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][asegurado]" value="@{{vehiculo.asegurado}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][adeudo]" value="@{{vehiculo.adeudo}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][caracteristicas]" value="@{{vehiculo.caracteristicas}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][nombre]" value="@{{vehiculo.nombre}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][curp]" value="@{{vehiculo.curp}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][sexo]" value="@{{vehiculo.sexo}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][edad]" value="@{{vehiculo.edad}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][ocupacion]" value="@{{vehiculo.ocupacion}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][domicilio]" value="@{{vehiculo.domicilio}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][telefono]" value="@{{vehiculo.telefono}}">
	</div>
	<div class="row">
		<div class="input-field col s6 offset-s3">
				<select id="nombre_emergencia"  name="emergencia" required>
		        		<option value="" disabled selected>Suceso</option>
		        		@foreach ($emergencias as $emergencias)
	                        <option value="{{$emergencias->id}}">{{$emergencias->nombre}}</option>
	                    @endforeach
		        </select>
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
		<div v-show="btnagregar">
			<a href="#!" v-on:click="nuevo" class="btn">Agregar</i></a>
		</div>
	</div>
	<div class="row">
		<div class="col s9 offset-s1">
			<table class="bordered striped centered responsive-table">
				<thead>
					<tr><th width="20px"></th>
						<th>Vehículo</th>
						<th >Conductor</th>
						<th></th>
					</tr>
				</thead>
				<tbody v-for="vehi in vehiculo">
					<tr >
						<td>@{{$index+1}}.-</td>
						<td>@{{vehi.marca}} @{{vehi.modelo}} @{{vehi.anio}}</td>
						<td>@{{vehi.nombre}}</td>
						<td><a href="#!" v-on:click="rm_vehi(vehi)">X</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row" >
		<div class="row" v-show="vehiculos">
				<div class="row">
					<center>
						<h3>
							<b>Añadir Vehículo</b>
						</h3>
					</center>
				</div>
				<div class="row">
					<div class="col s5 offset-s1">
						<b>Datos del vehículo</b>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2 offset-s1">
						<input type="text" id="marca" name="marca" v-model="marca">
						<label>Marca</label>
					</div>
					<div class="input-field col s3">
						<input type="text" id="modelo" name="modelo" v-model="modelo">
						<label>Modelo</label>
					</div>
					<div class="input-field col s2">
						<input type="text" name="anio" v-model="anio">
						<label>Año</label>
					</div>
					<div class="input-field col s3 ">
						<input type="text" name="serie" v-model="serie">
						<label>Serie</label>
					</div>
				</div>
				<div class="row">			
					<div class="input-field col s2 offset-s1">
						<input type="text" name="Placas" v-model="placas">
						<label>Placas</label>
					</div>
					<div class="input-field col s3 ">
						<select v-model="tipo">
							<option value="" disabled selected>Tipo de vehículo</option>
							<option :value="1">Auto</option>
							<option :value="2">Camioneta</option>
							<option :value="3">Camión</option>
							<option :value="4">Transporte</option>
							<option :value="5">Otro</option>
						</select>
					</div>
					<div class="input-field col s3">
						<input type="text" id="estado" name="estado" v-model="estado">
						<label>Procedencia</label>
					</div>
					<div class="input-field col s2">
						<input name="group1" type="radio" id="1" v-model="asegurado" :value="1"/>
				      	<label for="1">Consignado</label>
				      	<br>
						<input name="group1" type="radio" id="2" v-model="asegurado" :value="2"/>
				      	<label for="2">No Consignado</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10 offset-s1">
						<textarea id="caracteristicas" name="caracteristicas" class="materialize-textarea" v-model="caracteristicas"></textarea>
						<label for="textarea1">Características del vehículo</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s3 offset-s1">
						<input type="text" name="adeudo" v-model="adeudo">
						<label>Adeudo</label>
					</div>
					<div class="col s3 offset-s2">
						<a href="#!" v-on:click="personaevt" class="btn orange darken-3"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
					</div>
				</div>
		</div>
		<div class="row" v-show="personas">
		<br><br>
				<center>
					<a href="#!" v-on:click="vehievt" class="btn orange darken-3"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
				</center>
				<div class="row">
					<div class="col s5 offset-s1"><b>Datos del conductor</b></div>
				</div>
				<div class="row">
					<div class="input-field col s7 offset-s1 offset-m1 offset-l1">
						<input type="text" name="nombre" id="nombre" class="validate" minlength="3"  v-model="nombre">
						<label>Nombre(s)  Apellidos</label>
					</div>
					<div class="input-field col s3 m3 l3">
						<input type="text" id="tags" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99" v-model="curp">
						<label>CURP</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
						<select class="validate" name="sexo"  v-model="sexo">
								<option value="" selected disabled>Sexo</option>
								<option value="1"> Masculino</option>
								<option value="2"> Femenino</option>
						</select>
					</div>
					<div class="input-field col s3 m3 l3">
						<input id="tags" type="text" name="ocupacion" class="validate" v-model="ocupacion">
						<label id="texto" for="tags"></i>Ocupación</label>
					</div>
					<div class="input-field col s2 m2 l2">
						<input type="number" name="edad" min="5" max="120" class="validate" v-model="edad" >
						<label id="texto" for="usuario"></i>Edad</label>
					</div>
					<div class="input-field col s3 m3 l3">
						<input v-model="telefono" type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' name="telefono" class="validate" placeholder="(999)999-9999"> 
						<label id="texto" for="usuario"></i>Teléfono</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 offset-s1">
						<input type="text" name="domicilio" placeholder="calle numero colonia" v-model="domicilio">
						<label>Domicilio</label>
					</div>
				</div>
				<div class="row">
						<div class="col s3 offset-s4" >
							<a href="#!"  v-on:click="nonuevo" class="btn red accent-4">Cancelar</a>
						</div>
						<div class="col">
							<a href="#!" class="btn green accent-3" v-on:click="agregar">Agregar</a>
						</div>
				</div>		
		</div>
	</div>
	<div class="row">
		<div class="input-field col s4  offset-s6">
			<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
		</div>
	</div>
</form>

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
	      curp:"",
	      sexo:"",
	      edad:0,
	      ocupacion:"",
	      domicilio:"",
	      telefono:"",
	      btnagregar:true,
	      vehiculo:[],
	      vehiculos:false,
	      personas:false,

	  },
	  ready:function(){
	   	console.log(this.nombre);
	  },
	  methods:{
	  	agregar:function(){
	  		this.vehiculo.push({'marca':this.marca,'modelo':this.modelo,'anio':this.anio,'serie':this.serie,'placas':this.placas,
	  		'tipo':this.tipo,'asegurado':this.asegurado,'adeudo':this.adeudo,'caracteristicas':this.caracteristicas,'nombre':this.nombre,
	  		'curp':this.curp,'sexo':this.sexo,'edad':this.edad,'ocupacion':this.ocupacion,'domicilio':this.domicilio,'telefono':this.telefono});
	  		this.marca="";
			this.modelo="";
			this.anio="";
			this.serie="";
			this.placas="";
			this.tipo="";
			this.asegurado="";
			this.adeudo="";
			this.caracteristicas="";
			this.nombre="";
			this.curp="";
			this.sexo="";
			this.edad="";
			this.ocupacion="";
			this.domicilio="";
			this.telefono="";
			this.personas=!this.personas;
			this.btnagregar=!this.btnagregar;
	  	},
	  	nuevo:function(){
	  		
	  		this.btnagregar=!this.btnagregar;
	  		this.vehiculos=!this.vehiculos;
	  	},
	  	
	  	personaevt:function(){
	  		this.vehiculos=!this.vehiculos;
	  		this.personas=!this.personas;
	  	},
	  	vehievt:function(){
	  		this.personas=!this.personas;
	  		this.vehiculos=!this.vehiculos;
	  	},
	  	nonuevo:function(){
	  		this.btnagregar=!this.btnagregar;
	  		this.personas=!this.personas;
	  		
	  	},
	  	rm_vehi:function(vehi){
	  		console.log(vehi);
	  		this.vehiculo.$remove(vehi);
	  	},
	  	
	  },
});
</script>
<script src="/js/vialidad.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	
	var tags = [
	@foreach($personas as $val)
	"{{$val->curp}}",
	@endforeach
];

var nombre = [
	@foreach($personas as $val)
	"{{$val->nombre}}",
	@endforeach
];

var localidad =[
	@foreach($localidades as $val)
	"{{$val->nombre}}",
	@endforeach
];	
var ocupacion=[
	@foreach($ocupaciones as $val) 
	"{{$val->nombre}}",
	@endforeach
];
var marca=[
	@foreach($marca as $val)
	"{{$val->nombre}}",
	@endforeach
];
var estado=[
	@foreach($estado as $val)
	"{{$val->nombre}}",
	@endforeach
];

</script>
@stop