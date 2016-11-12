<div class="modal" id="modal1">
	<div class="modal-content">
		<div class="row">
			<center><h3><b>Añadir Vehículo</b></h3></center>
		</div>
		<div class="row">
			<div class="col s5 offset-s1">
				<b>Datos del vehículo</b>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s2 offset-s1">
				<input type="text" name="marca" v-model="marca">
				<label>Marca</label>
			</div>
			<div class="input-field col s3">
				<input type="text" name="modelo" v-model="modelo">
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
				<select name="estado" v-model="estado">
					<option  value="" disabled selected>Procedencia</option>
					@foreach($estados as $estado)
					<option :value="{{$estado['id']}}">{{$estado['nombre']}}</option>
					@endforeach
				</select>
			</div>
			<div class="input-field col s2">
				<select class="validate"  v-model="asegurado">
					<option value="" selected disabled>Asegurado</option>
					<option :value="1">Sí</option>
					<option :value="0">No</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s3 offset-s1">
				<input type="text" name="adeudo" v-model="adeudo">
				<label>Adeudo</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s10 offset-s1">
				<textarea id="caracteristicas" name="caracteristicas" class="materialize-textarea" v-model="caracteristicas"></textarea>
				<label for="textarea1">Características del vehículo</label>
			</div>
		</div>
		<div class="row">
			<div class="col s5 offset-s1"><b>Datos del conductor</b></div>
		</div>
		<div class="row">
			<div class="input-field col s3 m3 l3 offset-s1 offset-m1 offset-l1">
				<input type="text" name="nombre" id="nombre" class="validate" minlength="3"  v-model="nombre">
				<label>Nombre(s)</label>
			</div>
			<div class="input-field col s4 m4 l4">
				<input id="apellidos" type="text" name="apellidos" class="validate" minlength="3"  v-model="apellidso">
				<label>Apellidos</label>
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
	</div>
	<div>
		marca=@{{marca}},modelo=@{{modelo}},año=@{{anio}},serie=@{{serie}}<br>
		placas=@{{placas}},tipo=@{{tipo}},estado=@{{estado}},Asegurad0=@{{asegurado}}<br>
		adeudo=@{{adeudo}},caracteristica=@{{caracteristicas}},nombre=@{{nombre}},apellidos=@{{apellidos}}<br>curp=@{{curp}},sexo=@{{sexo}},edad=@{{edad}},ocupacion=@{{ocupacion}},domi=@{{domicilio}},tel=@{{telefono}}

	</div>
		<div class="modal-footer">
			<div class="row">
				<div class="input-field col s2  offset-s4">
					<a href="#!" v-on:click="guardar" class=" btn guardar">Agregar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

</div>