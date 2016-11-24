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

    <h4 class="center-align">REGISTRO DE INCIDENCIAS SP</h4>
    <hr>
<div class="row">
	<form action ="/sp" method="POST" >
    		{{ csrf_field() }}
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][nombre]" value="@{{agraviado.nombre}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][curp]" value="@{{agraviado.curp}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][domicilio]" value="@{{agraviado.domicilio}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][edad]" value="@{{agraviado.edad}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][ocupacion]" value="@{{agraviado.ocupacion}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][localidad]" value="@{{agraviado.localidad}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][sexo]" value="@{{agraviado.sexo}}">
    		<input  v-for="agraviado in agraviados" type="hidden" name="agrav[@{{$index}}][telefono]" value="@{{agraviado.telefono}}">	
			<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][nombre]" value="@{{asegurado.nombre}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][curp]" value="@{{asegurado.curp}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][domicilio]" value="@{{asegurado.domicilio}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][edad]" value="@{{asegurado.edad}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][ocupacion]" value="@{{asegurado.ocupacion}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][localidad]" value="@{{asegurado.localidad}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][sexo]" value="@{{asegurado.sexo}}">
    		<input  v-for="asegurado in asegurados" type="hidden" name="asegu[@{{$index}}][telefono]" value="@{{asegurado.telefono}}">
    		<div class="row">
		        <div class = " input-field col s6  offset-s1">
		        	<select id="nombre_emergencia" class="browser-default" name="emergencia" required>
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
					<input type="time" name="time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required name="hora">
				</div>
    		</div>
	    	<div class="row">
				<div class="input-field col s3 offset-s1">
					<select name="local" class="browser-default" required>
						<option value="" disabled selected>&nbsp;&nbsp; Localidad</option>
						@foreach ($localidades as $localidad)
			                <option value="{{$localidad['id_localidad']}}">&nbsp;&nbsp;&nbsp;{{$localidad['nombre']}}</option>
			            @endforeach
					</select>
				</div>
				<div class="input-field col s6 m6 l6">
					<input type="text" name="dom" class="validate" required placeholder="                      Calle # colonia">
					<label id="texto">Domicilio</label>
				</div>
				<br>
				<p><a id="show-option" title="
EJEMPLO: Madero #1 colonia Centro
En caso de ser una ubicación fuera de la cuidad especificar de la siguiente forma
EJEMPLO: Carretera Colima-Comala Km.3 S/N"><b>?</b></a></p>
			</div>
			</dir>
			<div class="row">
				<div class="col s1">
				<br>
					<p style="text-align: right;"><a id="show-option" title="Especificar la unidad (Vehículo) que atendío el incidente"><b>?</b></a></p>
				</div>
	        	<div class="input-field col s2  ">
					<input id="unidad" type="text" class="validate" name="unidad" required>
					<label id="texto">Unidad</label>
	        	</div>

	        	<div class="input-field col s6 m6 l6">
					<input id="policias" type="text" class="validate" name="policias" required>
					<label id="texto">Policías</label>
	        	</div>
	        	<div class="col s2 ">
	        		Tipo de Atención
	        		<select id="tipoatencion" name="atencion" class="browser-default" required>
					    <option value="1">Llamada al 066</option>
					    <option value="2">Llamada a Dirección</option>
					    <option value="3">Patrullaje</option>
					</select>
	        	</div>
	    	</div>
			<div class="row">
			</div>
			<div class="row">
			<div class="col s5 offset-s1">
				<div class="row">
					<div class="col s3offset-s1">
						Agraviado o Víctima
					</div>
					<div class="col s3" v-show="btn_agrav">
						<a href="#!" class="btn  green accent-3" v-on:click="agra" >Agregar</a>
					</div>
				</div>
				<div class="row">
					<table class="bordered striped centered ">
						<thead>
							<tr></tr>
						</thead>
						<tbody v-for="agraviado in agraviados">
							<tr>
								<td style="text-align:left; ">@{{$index+1}}.- @{{agraviado.nombre}} </td> <td> <a href="#!" id="show-option" title="Eliminar" v-on:click="rm_agra(agraviado)"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;<a id="show-option" title="Editar" href="#!" v-on:click="editaragra(agraviado)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col s5 ">
				<div class="row">
					<div class="col s4 offset-s1">
						Consignados
					</div>
					<div class="col s3" v-show="btn_aseg">
						<a href="#!" class="btn  green accent-3" v-on:click="aseg">agregar</a>
					</div>
				</div>
				<div class="row">
					<table class="bordered striped centered ">
						<thead>
							<tr></tr>
						</thead>
						<tbody v-for="asegurado in asegurados">
							<tr>
								<td style="text-align: left;"> @{{$index+1}}.- @{{asegurado.nombre}}</td> <td> <a id="show-option" title="Eliminar" href="#!" v-on:click="rm_aseg(asegurado)"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;<a id="show-option" title="Editar" href="#!" v-on:click="editaraseg(asegurado)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			<div class="row" v-show="agrav">
			<div class="col s10 offset-s1"><hr></div>			
			<center><h4>Agraviado</h4></center>
			<div class="row">
				<div class="input-field col s7 offset-s1 offset-m1 offset-l1">
					<input type="text" name="nombre" id="nombre" class="validate" minlength="3"  v-model="nombre">
					<label>Nombre(s) Apellidos</label>
				</div>
				<div class="input-field col s3 m3 l3">
					<input type="text" id="tags" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99" v-model="curp">
					<label>CURP</label>
				</div>
			</div>
			<div class="row">
				<div class="col s2 offset-s1">
					Sexo
					<p>
					<input name="group1" type="radio" id="1" v-model="sexo" :value="1" checked />
			      	<label for="3">Masculino</label>
			      	<br>
					<input name="group1" type="radio" id="2" v-model="sexo" :value="2"/>
			      	<label for="4">Femenino</label>
			      	</p>
				</div>
				<div class="input-field col s3 m3 l3">
					<input id="ocupacion" type="text" name="ocupacion" class="validate" v-model="ocupacion">
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
					<input type="text" name="domicilio" placeholder="calle número colonia" v-model="domicilio">
					<label>Domicilio</label>
				</div>
				<div class="input-field col s3 ">
					<input  id="localidad" type="text" name="localidad" v-model="localidad">
					<label>Localidad</label>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col s3 offset-s4">
					<a href="#!" class="btn  red accent-4" v-on:click="noagrav">cerrar</a>
				</div>
				<div class="col s3 ">
					<a href="#!"  class="btn light-blue darken-4" v-on:click="guardapersona">Agregar</a>
				</div>
			</div>
			<div class="col s10 offset-s1"><hr></div>
			</div>
			<div class="row" v-show="asegu">
			<div class="col s10 offset-s1"><hr></div>
			<center><h4>Consignado</h4></center>
			<div class="row">
				<div class="input-field col s7 offset-s1 offset-m1 offset-l1">
					<input type="text" name="nombre1" id="nombre1" class="validate" minlength="3"  v-model="nombre">
					<label>Nombre(s) Apellidos</label>
				</div>
				<div class="input-field col s3 m3 l3">
					<input type="text" id="tags1" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp1" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99" v-model="curp">
					<label>CURP</label>

				</div>
			</div>
			<div class="row">
				<div class="col s2 offset-s1">
					Sexo
					<p>
					<input name="group2" type="radio" id="3" v-model="sexo" :value="1" checked />
			      	<label for="3">Masculino</label>
			      	<br>
					<input name="group2" type="radio" id="4" v-model="sexo" :value="2"/>
			      	<label for="4">Femenino</label>
			      	</p>
				</div>
				<div class="input-field col s3 m3 l3">
					<input id="ocupacion1" type="text" name="ocupacion" class="validate" v-model="ocupacion">
					<label id="texto" for="tags"></i>Ocupación</label>
				</div>
				<div class="input-field col s2 m2 l2">
					<input type="number" name="edad1" min="5" max="120" class="validate" v-model="edad" >
					<label id="texto" for="usuario"></i>Edad</label>
				</div>
				<div class="input-field col s3 m3 l3">
					<input v-model="telefono" type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' name="telefono1" class="validate" placeholder="(999)999-9999"> 
					<label id="texto" for="usuario"></i>Teléfono</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6 offset-s1">
					<input type="text" name="domicilio1" placeholder="calle número colonia" v-model="domicilio">
					<label>Domicilio</label>
				</div>
				<div class="input-field col s3 ">
					<input  id="localidad1" type="text" name="localidad1" v-model="localidad">
					<label>Localidad</label>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col s3 offset-s4">
					<a href="#!" class="btn  red accent-4" v-on:click="noaseg">cerrar</a>
				</div>
				<div class="col s3 ">
					<a href="#!" class="btn light-blue darken-4" v-on:click="guardapersona2">Agregar</a>
				</div>
			</div>
			<div class="col s10 offset-s1"><hr></div>
			</div>
			</div>
			<div class="row">
		    	<div class = "col s2 offset-s1">
					<br>
					Aseguramiento
				</div>
				<div class="input-field col s8">
					<input type="text" name="aseguramiento" class="validate" required>
					
				</div>
			</div> 
	        <div class="row">
	        	<div class="col s2 offset-s1">
	        		Observaciones
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col s10 offset-s1">
	        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" required></textarea>
	        	</div>
	        </div>
	        <div class="row">	
	        	<div class="col s2 offset-s9">
	        		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 ">REGISTRAR&nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	        	</div>
	        </div>

	</form>
</div>

@stop
@section('script')
<script type="text/javascript">
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
	new Vue({
		el:'body',
		data:{
			tipo:"",
			sexo:"",
			nombre:"",
			curp:"",
			ocupacion:"",
			edad:"",
			telefono:"",
			domicilio:"",
			localidad:"",
			agraviados:[],
			asegurados:[],
			agrav:false,
			asegu:false,
			btn_aseg:true,
			btn_agrav:true,
			btncanagrav:false,
		},
		ready:function(){
			
		},
		methods:{
			editaraseg:function(asegurado){
				this.asegu=!this.asegu;
				this.btn_aseg=!this.btn_aseg;
				this.nombre=asegurado.nombre;this.domicilio=asegurado.domicilio;
				this.curp=asegurado.curp;this.ocupacion=asegurado.ocupacion;
				this.edad=asegurado.edad;this.telefono=asegurado.telefono;this.localidad=asegurado.localidad;
				this.asegurados.$remove(asegurado);
			},
			editaragra:function(agraviado){
				//console.log(agraviado);
				this.agrav=!this.agrav;
				this.btn_agrav=!this.btn_agrav;	
				this.nombre=agraviado.nombre;this.domicilio=agraviado.domicilio;
				this.curp=agraviado.curp;this.ocupacion=agraviado.ocupacion;
				this.edad=agraviado.edad;this.telefono=agraviado.telefono;this.localidad=agraviado.localidad;
				this.agraviados.$remove(agraviado);
			},
			agra:function(){
				this.agrav=!this.agrav;
				this.btn_agrav=!this.btn_agrav;	
			},
			noagrav:function(){
				this.agrav=!this.agrav;
				this.btn_agrav=!this.btn_agrav;
				this.nombre="";this.domicilio="";
					this.curp="";this.domicilio="";this.ocupacion="";
					this.edad="";this.telefono="";this.localidad="";
			},
			noaseg:function(){
				this.asegu=!this.asegu;
				this.btn_aseg=!this.btn_aseg;
				this.nombre="";this.domicilio="";
					this.curp="";this.domicilio="";this.ocupacion="";
					this.edad="";this.telefono="";this.localidad="";
			},
			aseg:function(){
				this.asegu=!this.asegu;
				this.btn_aseg=!this.btn_aseg;
			},
			rm_agra:function(agraviado){
				this.agraviados.$remove(agraviado);
			},
			rm_aseg:function(asegurado){
				this.asegurados.$remove(asegurado);
			},
			guardapersona:function(){
				this.agrav=!this.agrav;
				this.btn_agrav=!this.btn_agrav;
				this.agraviados.push({'nombre': this.nombre, 
					'curp':this.curp,'ocupacion':this.ocupacion,'edad':this.edad,'telefono':this.telefono,
					'domicilio':this.domicilio,'sexo':this.sexo,'localidad':this.localidad});
					console.log(this.agraviados);
					this.nombre="";this.domicilio="";
					this.curp="";this.domicilio="";this.ocupacion="";
					this.edad="";this.telefono="";this.localidad="";
			},
			guardapersona2:function(){
					this.asegu=!this.asegu;
					this.btn_aseg=!this.btn_aseg;
					this.asegurados.push({'nombre': this.nombre, 
					'curp':this.curp,'ocupacion':this.ocupacion,'edad':this.edad,'telefono':this.telefono,
					'domicilio':this.domicilio,'sexo':this.sexo,'localidad':this.localidad});
					console.log(this.asegurados);
					this.nombre="";this.domicilio="";
					this.curp="";this.domicilio="";this.ocupacion="";
					this.edad="";this.telefono="";this.localidad="";
			}
		}

	});
</script>
@stop
@section('script2')
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
var tags2 = [
	@foreach($personas as $val)
	"{{$val->curp}}",
	@endforeach
];

var nombre2 = [
	@foreach($personas as $val)
	"{{$val->nombre}}",
	@endforeach
];

var localidad2 =[
	@foreach($localidades as $val)
	"{{$val->nombre}}",
	@endforeach
];	
var ocupacion2=[
	@foreach($ocupaciones as $val) 
	"{{$val->nombre}}",
	@endforeach
];

</script>
<script src="/js/segpub.js"></script>
@stop