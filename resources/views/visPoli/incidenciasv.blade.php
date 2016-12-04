@extends('templates.tsegpub2')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de incidencias viales</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h3>Consulta de incidencias viales</h3></center>
<hr>
<div class="row">
		<center><h5><b>Seleccione el tipo de consulta</b></h5></center>
	</div>
	<div class="row">
		<div class="col s2 offset-s2">
			<input  id="a1" type="radio" name="g1" v-on:click="a1" >
			<label for="a1">El día de Hoy</label>
		</div>
		<div class="col s2">
			<input  id="a2" type="radio" name="g1" v-on:click="a2" >
			<label for="a2">Ayer </label>
		</div>
		<div class="col s2">
			<input  id="a3" type="radio" name="g1" v-on:click="a3" >
			<label for="a3">Todo el mes</label>
		</div>
		<div class="col s2">
			<input  id="a4" type="radio" name="g1" v-on:click="a4" >
			<label for="a4">Entre fechas</label>
		</div>
	</div>
	<div class="row" v-show="tres">
		<form>
			{{csrf_field()}}
			<div class="row">
				<div class="col s4 offset-s4">
					<center><h4>Seleccione el mes</h4></center>
				</div>	
			</div>
			<div class="row">
				<div class="input-field col s2 offset-s5">
			    	<select id="mes" name="mes" class="browser-default">
			    	 <option value="0">Mes...</option>
				       <option value="1">Enero</option>
			            <option value="2">Febrero</option>
			            <option value="3">Marzo</option>
			            <option value="4">Abril</option>
			            <option value="5">Mayo</option>
			            <option value="6">Junio</option>
			            <option value="7">Julio</option>
			            <option value="8">Agosto</option>
			            <option value="9">Septiembre</option>
			            <option value="10">Octubre</option>
			            <option value="11">Noviembre</option>
			            <option value="12">Diciembre</option>
			        </select>
			    </div>
			</div>
			<div class="row">
				<div class="col s2 offset-s5">
					<a id="enviar" class=" waves-effect btn  indigo darken-1">Buscar</a>
				</div>
			</div>
		</form>
	</div>
	<div class="row" v-show="cuatro">
		<form >
				<div class="row">
				<div class="col s3 offset-s1">
					<center><h4>Fecha de inicio</h4></center>
				</div>
				<div class="col s3 offset-s3">
					<center><h4>Fecha Final</h4></center>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s1 offset-s1">
				    <select id="dia1" name="dia" class="browser-default">
				     <option value="0" disabled selected >Dia</option>
				     <option value="1" >1</option>
				     <option value="2" >2</option>
				     <option value="3" >3</option>
				     <option value="4" >4</option>
				     <option value="5" >5</option>
				     <option value="6" >6</option>
				     <option value="7" >7</option>
				     <option value="8" >8</option>
				     <option value="9" >9</option>
				     <option value="10" >10</option>
				     <option value="11" >11</option>
				     <option value="12" >12</option>
				     <option value="13" >13</option>
				     <option value="14" >14</option>
				     <option value="15" >15</option>
				     <option value="16" >16</option>
				     <option value="17" >17</option>
				     <option value="18" >18</option>
				     <option value="19" >19</option>
				     <option value="20" >20</option>
				     <option value="21" >21</option>
				     <option value="22" >22</option>
				     <option value="23" >23</option>
				     <option value="24" >24</option>
				     <option value="25" >25</option>
				     <option value="26" >26</option>
				     <option value="27" >27</option>
				     <option value="28" >28</option>
				     <option value="29" >29</option>
				     <option value="30" >30</option>
				     <option value="31" >31</option>
				    </select>
				</div>

			    <div class="input-field col s2">
			    	<select id="mes1" name="mes" class="browser-default">
			    	 <option value="0" disabled selected>Elige el Mes</option>
				       <option value="1">Enero</option>
			            <option value="2">Febrero</option>
			            <option value="3">Marzo</option>
			            <option value="4">Abril</option>
			            <option value="5">Mayo</option>
			            <option value="6">Junio</option>
			            <option value="7">Julio</option>
			            <option value="8">Agosto</option>
			            <option value="9">Septiembre</option>
			            <option value="10">Octubre</option>
			            <option value="11">Noviembre</option>
			            <option value="12">Diciembre</option>
			        </select>
			    </div>

			     <div class="input-field col s1">
			     	<select name="año1" id="año1" class="browser-default">
			     		<option value="" Disabled selected>Año</option>
			     		<?php 
			     		$año=DAte('Y');
			     		for ($i=$año; $i >=2015 ; $i--) { 
			     			echo "<option value=".$i.">".$i."</option>";
			     		}
			     	 ?>
			     	</select>

			    </div>

			<!-- segundo grupo de inputs para fecha limite -->

			    <div class="input-field col s1 offset-s2">
				    <select id="dia2" name="dia2" class="browser-default">
				    <option value="0" >Dia</option>
				     <option value="1" >1</option>
				     <option value="2" >2</option>
				     <option value="3" >3</option>
				     <option value="4" >4</option>
				     <option value="5" >5</option>
				     <option value="6" >6</option>
				     <option value="7" >7</option>
				     <option value="8" >8</option>
				     <option value="9" >9</option>
				     <option value="10" >10</option>
				     <option value="11" >11</option>
				     <option value="12" >12</option>
				     <option value="13" >13</option>
				     <option value="14" >14</option>
				     <option value="15" >15</option>
				     <option value="16" >16</option>
				     <option value="17" >17</option>
				     <option value="18" >18</option>
				     <option value="19" >19</option>
				     <option value="20" >20</option>
				     <option value="21" >21</option>
				     <option value="22" >22</option>
				     <option value="23" >23</option>
				     <option value="24" >24</option>
				     <option value="25" >25</option>
				     <option value="26" >26</option>
				     <option value="27" >27</option>
				     <option value="28" >28</option>
				     <option value="29" >29</option>
				     <option value="30" >30</option>
				     <option value="31" >31</option>
				    </select>
				</div>

			    <div class="input-field col s2">
			    	<select id="mes2" name="mes2" class="browser-default">
			    	 <option value="0">Elige el Mes</option>
				        <option value="1">Enero</option>
			            <option value="2">Febrero</option>
			            <option value="3">Marzo</option>
			            <option value="4">Abril</option>
			            <option value="5">Mayo</option>
			            <option value="6">Junio</option>
			            <option value="7">Julio</option>
			            <option value="8">Agosto</option>
			            <option value="9">Septiembre</option>
			            <option value="10">Octubre</option>
			            <option value="11">Noviembre</option>
			            <option value="12">Diciembre</option>
			        </select>
			       
			    </div>

			     <div class="input-field col s1">
			    	<select name="año2" id="año2" class="browser-default">
			     		<option value="" Disabled selected>Año</option>
			     		<?php 
			     		$año=DAte('Y');
			     		for ($i=$año; $i >=2015 ; $i--) { 
			     			echo "<option value=".$i.">".$i."</option>";
			     		}
			     	 ?>
			     	</select>
			    </div>
			</div>

			<div class="row">
				<div class="col s2 offset-s5">
					<a id="enviar2" class=" waves-effect btn  indigo darken-1">Buscar</a>
				</div>
			</div>
		</form>
	</div>
	<div id="error" class="row">
	<center>
		<h5>
			No se encontraron incidencias
		</h5>
	</center>
</div>
<div id="efect" class="row">
	<CENTER><h5>Lista de incedentes</h5></CENTER>
	<div class="col s10 offset-s1">
		<table class="bordered highlight centered" id="app"><thead>
					<tr>
						<td><center>Fecha</center></td>
						<td><center>Hora</center></td>
						<td><center>Suceso</center></td>
						<td><center>Atención</center></td>
						<td>&nbsp;</td>
					</tr>
				</thead>
			<tbody id="tincidenciaV">

			</tbody>
		</table>
	</div>
	
</div>
@stop
@section('script')
<script type="text/javascript">
	new Vue({
		el:'body',
		data:{
			tres:false,
			cuatro:false,
		},
		methods:{
			a1:function(){

				this.cuatro=false;

				this.tres=false;
				$( '#efect' ).hide();
				$( '#app tbody > tr' ).remove();		
			},
			a2:function(){
	
				this.cuatro=false;
				this.tres=false;
				$( '#efect' ).hide();
				$( '#app tbody > tr' ).remove();
			},
			a3:function(){
				this.tres=true;

				this.cuatro=false;
				$( '#efect' ).hide();
				$( '#app tbody > tr' ).remove();
			},
			a4:function(){
				this.cuatro=true;

				this.tres=false;
				$( '#efect' ).hide();
				$( '#app tbody > tr' ).remove();
			},
		}
	});

</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/incivial.js"></script>
@stop
