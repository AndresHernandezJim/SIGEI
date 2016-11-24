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
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][nombre]" value="@{{herido.nombre}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][curp]" value="@{{herido.curp}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][sexo]" value="@{{herido.sexo}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][edad]" value="@{{herido.edad}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][ocupacion]" value="@{{herido.ocupacion}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][telefono]" value="@{{herido.telefono}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][domicilio]" value="@{{herido.domicilio}}">
    <input v-for="herido in pherido" type="hidden" name="herido[@{{$index}}][localidad]" value="@{{herido.localidad}}">

  </div>
  <div class="row">
    <div class="input-field col s6 offset-s1">
        <select id="nombre_emergencia"  name="emergencia" required v-model="emergencia">
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
    <div class="col s4 offset-s1">
      <input name="group6" type="radio" id="r20" v-model="herido" :value="1"  v-on:click="injuri"/>
      <label for="r20">Se registran heridos en el incidente</label>
      <br>
      <input name="group6" type="radio" id="r21" v-model="herido" :value="2" checked v-on:click="noinjuri"/>
      <label for="r21">Sin heridos</label>
    </div>
  </div>
  <div class="row" v-show="heridos">
    <div class="row">
      <div class="input-field col s4 offset-s1">
        <b>&nbsp;Personas heridas</b>
      </div>
      <div v-show="btnpersona">
          <a href="#!" v-on:clicK="addinj" class="btn">Agregar</a>
      </div>
    </div>
    <div class="row">
      <div class="col s9 offset-s1">
        <table class="bordered striped highligth centered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Domicilio</th>
              <th width="60px;">Edad</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="herido in pherido"> 
              <td>@{{herido.nombre}}</td>
              <td>@{{herido.domicilio}}</td>
              <td>@{{herido.edad}}</td>
              <td>
                <a href="#!" v-on:click="rmher(herido)" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                  &nbsp;&nbsp;
                <a href="#!" v-on:click="modheri(herido)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row" v-show="personas2">
      <div class="row">
          <center><h5><b>Persona Afectada</b></h5></center>
      </div>
      <div class="row">
          <div class="input-field col s7 offset-s1 offset-m1 offset-l1">
            <input type="text" name="nombre" id="nombre2" class="validate" minlength="3"  v-model="nombre2">
            <label>Nombre(s)  Apellidos</label>
          </div>
          <div class="input-field col s3 m3 l3">
            <input type="text" id="tags2" font style="text-transform: uppercase;" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp2" minlength="18" maxlength="18" class="validate" placeholder="AAAA999999AAAAAA99" v-model="curp2">
            <label>CURP</label>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s2 m2 l2 offset-s1 offset-m1 offset-l1">
          <input name="group7" type="radio" id="15" v-model="sexo2" :value="1" checked />
            <label for="15">Masculino</label>
          <br>
          <input name="group7" type="radio" id="16" v-model="sexo2" :value="2"/>
          <label for="16">Femenino</label>
        </div>
        <div class="input-field col s3 m3 l3">
          <input id="ocupacion" type="text" name="ocupacion2" class="validate" v-model="ocupacion2">
          <label id="texto" for="tags"></i>Ocupación</label>
        </div>
        <div class="input-field col s2 m2 l2">
          <input type="number" name="edad2" min="0" max="120" class="validate" v-model="edad2" >
            <label id="texto" for="usuario"></i>Edad</label>
        </div>
        <div class="input-field col s3 m3 l3">
          <input v-model="telefono2" type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' title='Phone Number (Format: (999)999-9999)' name="telefono2" class="validate" placeholder="(999)999-9999"> 
            <label id="texto" for="usuario"></i>Teléfono</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 offset-s1">
          <input type="text" name="domicilio2" placeholder="calle numero colonia" v-model="domicilio2">
            <label>Domicilio</label>
        </div>
        <div class="input-field col s2">
          <input type="text" id="localidad2" name="localidad" v-model="localidad2">
            <label>Localidad</label>
        </div>
      </div>
      <div class="row">
        <div class="col s3 offset-s4" >
          <a href="#!"  v-on:click="nonuevo2" class="btn red accent-4">Cancelar</a>
        </div>
        <div class="col">
          <a href="#!" class="btn green accent-3" v-on:click="agregar2">Agregar</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="input_field col s4 offset-s1">
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
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody v-for="vehi in vehiculo">
          <tr >
            <td>@{{$index+1}}.-</td>
            <td>@{{vehi.marca}} @{{vehi.modelo}} @{{vehi.anio}}</td>
            <td>@{{vehi.nombre}}</td>
            <td>
              <a href="#!" v-on:click="rm_vehi(vehi)"><i class="fa fa-trash" aria-hidden="true"></i></a>
              &nbsp;&nbsp;
              <a href="#!" v-on:click="editar(vehi)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </td>
            <td>
              
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row" >
    <div class="row" v-show="vehiculos">
        <div class="row">
          <center>
            <h5>
              <b>Añadir Vehículo</b>
            </h5>
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
          <div class="col s10 offset-s1">
            <center>
              <a href="#!"  v-on:click="nonuevo3" class="btn red accent-4">Cancelar</a>
            &nbsp;&nbsp;&nbsp;
            <a href="#!" v-on:click="personaevt" class="btn orange darken-3"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
            </center>
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
          <div class="col s10 offset-s1">
            <center>
              <a href="#!"  v-on:click="nonuevo" class="btn red accent-4">Cancelar</a>
              &nbsp;&nbsp;&nbsp;
              <a href="#!" class="btn green accent-3" v-on:click="agregar">Agregar</a>
            </center>
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
        personas2:false,
        elconsignado:false,
        herido:"",
        heridos:false,
        pherido:[],
        nombre2:"",
        curp:"",
        localidad2:"",
        sexo2:"",
        edad2:0,
        ocupacion2:"",
        domicilio2:"",
        telefono2:"",
        btnpersona:true,

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
      agregar2:function(){
        this.pherido.push({
          'nombre':this.nombre2,'curp':this.curp2,'sexo':this.sexo2,'edad':this.edad2,'ocupacion':this.ocupacion2,
          'domicilio':this.domicilio2,'telefono':this.telefono2,'localidad':this.localidad2
          });
        this.nombre2="";this.curp2="";this.sexo2="";this.edad2="";this.ocupacion2="";this.domicilio2="";
      this.telefono2="";this.localidad2="";this.personas2=false;
        console.log(this.pherido);
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
      nonuevo3:function(){
        this.btnagregar=!this.btnagregar;
        this.vehiculos=false;
        
      },
      rm_vehi:function(vehi){
        console.log(vehi);
        this.vehiculo.$remove(vehi);
      },
      consignado:function(){
        this.elconsignado=true;
      },
      noconsignado:function(){
        this.ubicacion="";
        this.elconsignado=false;
      },
      editar:function(vehi){
        this.marca=vehi.marca;this.modelo=vehi.modelo;this.anio=vehi.anio;this.serie=vehi.serie;
        this.placas=vehi.placas;this.tipo=vehi.tipo;this.estado=vehi.estado;this.consignado=vehi.consignado;
        this.adeudo=vehi.adeudo;this.caracteristicas=vehi.caracteristicas;this.nombre=vehi.nombre;
        this.curp=vehi.curp;this.sexo=vehi.sexo;this.ubicacion=vehi.ubicacion;this.edad=vehi.edad;
        this.ocupacion=vehi.ocupacion;this.domicilio=vehi.domicilio;this.telefono=vehi.telefono;
        this.localidad=vehi.localidad;
        this.vehiculo.$remove(vehi);
        this.vehiculos=!this.vehiculos;
      this.btnagregar=!this.btnagregar;this.culpable="";this.elconsignado=false;
      },
      injuri:function(){
        this.heridos=true;
      },
      noinjuri:function(){
        this.heridos=false;
      },
      addinj:function() {
        this.personas2=true;
      },
      nonuevo2:function(){
        this.personas2=false;
      },rmher:function(herido){
        this.pherido.$remove(herido);
      },
      modheri:function(herido){
        this.personas2=true;
        this.nombre2=herido.nombre;this.curp2=herido.curp;this.sexo2=herido.sexo;this.edad2=herido.edad;this.ocupacion2=herido.ocupacion;this.domicilio2=herido.domicilio;
      this.telefono2=herido.telefono;this.localidad2=herido.localidad;
      this.pherido.$remove(herido);
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