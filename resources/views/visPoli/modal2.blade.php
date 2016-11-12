
<div class="modal" id="modal2">
	<div class="modal-content">
		<center><h4>Consignado</h4></center>
		<div class="row">
			<div class="input-field col s3 m3 l3 offset-s1 offset-m1 offset-l1">
				<input type="text" name="nombre" id="nombre1" class="validate" minlength="3"  v-model="nombre">
				<label>Nombre(s)</label>
			</div>
			<div class="input-field col s4 m4 l4">
				<input id="apellidos" type="text" name="apellido" class="validate" minlength="3"  v-model="apellido">
				<label>Apellidos</label>
			</div>
			<div class="input-field col s3 m3 l3">
				<input type="text" id="tags" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99" v-model="curp">
				<label>CURP</label>
			</div>
		</div>
		<div class="row">
			<div class="col s3 offset-s1">
				Sexo
				<p>
				<input name="group2" type="radio" id="3" v-model="sexo" :value="1" checked />
		      	<label for="3">Masculino</label>
				<input name="group2" type="radio" id="4" v-model="sexo" :value="2"/>
		      	<label for="4">Femenino</label>
		      	</p>
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
			<div class="input-field col s3 ">
				<input type="text" name="localidad" v-model="loclaidad">
				<label>Localidad</label>
			</div>
		</div>		
		<br>
		<br>
		<div class="row">
			<div class="col s3 offset-ss">
				<a href="#!" class="btn light-blue darken-4" v-on:click="guardapersona2">Agregar</a>
			</div>
		</div>
	</div>
</div>
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

var apellido = [
	@foreach($personas as $val)
	"{{$val->apellido}}",
	@endforeach
];
var localidad =[
	@foreach($localidades as $val)
	"{{$val->nombre}}",
	@endforeach
];	

</script>
<script src="/js/historial.js"></script>
@stop