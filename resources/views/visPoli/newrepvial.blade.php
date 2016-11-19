@extends('templates.tsegpub')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Incidencias de Vialidad</a>
    </div>
  </div>
  
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
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][responsable]" value="@{{vehiculo.responsable}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][caracteristicas]" value="@{{vehiculo.caracteristicas}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][estado]" value="@{{vehiculo.estado}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][ubicacion]" value="@{{vehiculo.ubicacion}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][nombre]" value="@{{vehiculo.nombre}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][curp]" value="@{{vehiculo.curp}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][sexo]" value="@{{vehiculo.sexo}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][edad]" value="@{{vehiculo.edad}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][ocupacion]" value="@{{vehiculo.ocupacion}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][domicilio]" value="@{{vehiculo.domicilio}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][telefono]" value="@{{vehiculo.telefono}}">
		<input v-for="vehiculo in vehiculo" type="hidden" name="vehiculo[@{{$index}}][localidad]" value="@{{vehiculo.localidad}}">
	</div>
	<div class="row">
		<div class="input-field col s6 offset-s1">
				<select id="nombre_emergencia"  name="emergencia" required>
		        		<option value="" disabled selected>Suceso</option>
		        		@foreach ($emergencias as $emergencias)
	                        <option value="{{$emergencias->id}}">{{$emergencias->nombre}}</option>
	                    @endforeach
		        </select>
		</div>
		<div class="col s1">
			<br>
			Hora
		</div>
		<div class = "input-field col s2">
					<input type="time" name="time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9)?$" class="inputs time" required name="hora">

				</div>
	</div>
	<div class="row">
		<div class="input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
				<select class="validate" name="local" required>
						<option value="" selected disabled>Localidad</option>	
						@foreach($localidades as $localidad)
						<option value="{{$localidad['id_localidad']}}">{{$localidad['nombre']}}</option>
						@endforeach
				</select>
			</div>
			<div class="input-field col s3 m3 l3">
				<input  type="text" name="colonia1" class="validate" required>
				<label id="texto" for="colonia1"></i>Colonia</label>
			</div>
			<div class="input-field col s2 m2 l2">
				<input type="text" name="calle1"  class="validate" required>
				<label id="texto" for="calle1"></i>Calle</label>
			</div>
			<div class="input-field col s2 m2 l2">
				<input type="number" name="numero1" min="0" max="9999" class="validate" required>
				<label id="texto" for="numero1"></i>Número</label>
			</div>
	</div>
	<div class="row">
		<div class="input-field col s3 offset-s1">
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
						<input type="number" min="1950" name="anio" v-model="anio">
						<label>Año</label>
					</div>
					<div class="input-field col s3 ">
						<input type="text" name="serie" maxlength="17" v-model="serie">
						<label>Serie</label>
					</div>
				</div>
				<div class="row">			
					<div class="input-field col s2 offset-s1">
						<input type="text" name="Placas" maxlength="10" v-model="placas" font style="text-transform: uppercase;">
						<label>Placas</label>
					</div>
					<div class="input-field col s3 ">
						<input type="text" id="tipo" name="tipo" v-model="tipo">
						<label>Tipo Vehiculo</label>
						<!--select v-model="tipo" >
							<option value="" disabled selected>Tipo de vehículo</option>
							<option v-for="tipo in tipos" :value.sync="@{{tipo.val}}">@{{tipo.nombre}}</option>
						</select-->
					</div>
					<div class="input-field col s3">
						<input type="text" id="estado" name="estado" v-model="estado">
						<label>Procedencia</label>
					</div>
					<div class="input-field col s2">
						<input name="group1" type="radio" id="1" v-model="asegurado" :value="1" v-on:click="consignado"/>
				      	<label for="1">Consignado</label>
				      	<br>
						<input name="group1" type="radio" id="2" v-model="asegurado" :value="2" checked v-on:click="noconsignado"/>
				      	<label for="2">No Consignado</label>
					</div>
				</div>
				<div class="row" v-show="elconsignado">
					<div class="row">
						<div class="col s offset-s1">
							Ubicacado en:
						</div>	
						<div class="col s2">
							<input type="radio" name="group3" v-model="ubicacion" id="5" :value="1" >
							<label for="5">El Mezquite</label>
						</div>
						<div class="col s2">
							<input type="radio" name="group3" v-model="ubicacion" id="6" :value="2" >
							<label for="6">Gruas Ralf</label>
						</div>
						<div class="col s4">
							<input type="radio" name="group3" v-model="ubicacion" id="7" :value="3" >
							<label for="7">Estacionamiento del Complejo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s3 offset-s1" v-show="elconsignado">
							<input type="number" step="any" name="adeudo" v-model="adeudo">
							<label>Monto Adeudado</label>
						</div>
					</div>

					
				</div>
				<div class="row">
					<div class="input-field col s10 offset-s1">
						<textarea id="caracteristicas" name="caracteristicas" class="materialize-textarea" v-model="caracteristicas"></textarea>
						<label for="textarea1">Características del vehículo</label>
					</div>
				</div>
				<div class="row">
					
					<div class="col s2 offset-s1">
					<br>
						<center>
							Parte en el  incidente
						</center>
					</div>
					<div class="col s3">
					<br>
						<input type="radio" name="gropu4"  id="10" value="2" v-model="culpable">
						<label for="10">Responsable del incidente</label>
						<input type="radio" name="group4" id="9" value="1" v-model="culpable">
						<label for="9">Afectado</label>
					</div>
				</div>
				<div class="row">
					<center>
						<a href="#!" v-on:click="personaevt" class="btn orange darken-3"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
					</center>
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

								<input name="group" type="radio" id="3" v-model="sexo" :value="1" checked />
				      			<label for="3">Masculino</label>
				      			<br>
								<input name="group" type="radio" id="4" v-model="sexo" :value="2"/>
				      			<label for="4">Femenino</label>
					</div>
					<div class="input-field col s3 m3 l3">
						<input id="ocupacion" type="text" name="ocupacion" class="validate" v-model="ocupacion">
						<label id="texto" for="tags"></i>Ocupación</label>
					</div>
					<div class="input-field col s2 m2 l2">
						<input type="number" name="edad" min="0" max="120" class="validate" v-model="edad" >
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
					<div class="input-field col s2">
						<input type="text" id="localidad" name="localidad" v-model="localidad">
						<label>Localidad</label>
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
	      tipo:"",
	      estado:"",
	      asegurado:0,
	      adeudo:"",
	      caracteristicas:"",
	      nombre:"",
	      curp:"",
	      localidad:"",
	      sexo:"",
	      edad:0,
	      ocupacion:"",
	      domicilio:"",
	      culpable:"",
	      telefono:"",
	      ubicacion:"",
	      btnagregar:true,
	      vehiculo:[],
	      vehiculos:false,
	      personas:false,
	      elconsignado:false,
	      tipos:[
	      	{nombre:"Auto",val:1},{nombre:"Camioneta",val:2},{nombre:"Camion",val:3},{nombre:"Motocicleta",val:4},{nombre:"Otros",val:5}
	      ],

	  },
	  ready:function(){
	   	
	  },
	  methods:{
	  	agregar:function(){
	  		this.vehiculo.push({'marca':this.marca,'modelo':this.modelo,'anio':this.anio,'serie':this.serie,'placas':this.placas,
	  		'tipo':this.tipo,'asegurado':this.asegurado,'ubicacion':this.ubicacion,'estado':this.estado,'adeudo':this.adeudo,'caracteristicas':this.caracteristicas,'responsable':this.culpable,'nombre':this.nombre,'curp':this.curp,'sexo':this.sexo,'edad':this.edad,'ocupacion':this.ocupacion,'domicilio':this.domicilio,'telefono':this.telefono,'localidad':this.localidad});
	  		this.marca="";this.modelo="";this.anio=1950;this.serie="";this.placas="";this.tipo="";this.estado="";
			this.asegurado="";this.adeudo="";this.caracteristicas="";this.nombre="";this.curp="";this.sexo="";this.ubicacion="";
			this.edad="";this.ocupacion="";this.domicilio="";this.telefono="";this.localidad="";this.personas=!this.personas;
			this.btnagregar=!this.btnagregar;this.culpable="";this.elconsignado=false;
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
	  	consignado:function(){
	  		this.elconsignado=!this.elconsignado;
	  	},
	  	noconsignado:function(){
	  		this.ubicacion="";
	  		this.elconsignado=!this.elconsignado;
	  	}
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

var tipo=[
	@foreach($tipo as $val)
	"{{$val->nombre}}",
	@endforeach	
];
var modelo=[
	@foreach($modelo as $val)
	"{{$val->nombre}}",
	@endforeach
];

</script>
@stop