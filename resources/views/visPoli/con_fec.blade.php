@extends('templates.tsegpub2')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de vehiculo por fecha</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h3>Asegurados en fecha</h3></center>
<hr>
<form>
{{csrf_field()}}
		<div class="row">
			<div class="col s3 offset-s1">
				<center><h4>Fecha de inicio</h4></center>
			</div>
			<div class="col s3 offset-s3">
				<center><h4>Fecha Fin</h4></center>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s1 offset-s1">
			    <select id="dia" name="dia">
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
			<label>Dia</label>
			</div>

		    <div class="input-field col s2">
		    	<select id="mes" name="mes">
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
		        <label>Mes</label>
		    </div>

		     <div class="input-field col s1">
		    	<input type="text" id="anio" name="anio" value="2016" readonly="">
		        <label>Año</label>
		    </div>

		<!-- segundo grupo de inputs para fecha limite -->

		    <div class="input-field col s1 offset-s2">
			    <select id="dia2" name="dia2">
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
			<label>Dia</label>
			</div>

		    <div class="input-field col s2">
		    	<select id="mes2" name="mes2">
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
		        <label>Mes</label>
		    </div>

		     <div class="input-field col s1">
		    	<input type="text" id="anio2" name="anio2" value="2016" readonly="">
		        <label>Año</label>
		    </div>
		</div>

		<div class="row">
			<div class="col s2 offset-s5">
				<a id="enviar" class=" waves-effect btn  indigo darken-1">Buscar</a>
			</div>
		</div>
</form>
<hr>
<div id="error" class="row">
	<center>
		<h5>
			No se encontraron registros
		</h5>
	</center>
</div>
<div id="efect" class="row">
	<CENTER><h5>Datos de los vehiculos</h5></CENTER>
	<div class="col s10 offset-s1">
		<table class="bordered highlight centered" id="app"><thead><tr><th>Marca</th><th>Modelo</th><th>Año</th><th>Placas</th></thead>
			<tbody id="tautos">

			</tbody>
		</table>
	</div>
	
</div>
@stop
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/fecha.js"></script>
@stop
