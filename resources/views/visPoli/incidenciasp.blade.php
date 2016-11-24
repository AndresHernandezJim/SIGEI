@extends('templates.tsegpub2')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de incidencias</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h3>Consulta de incidencias</h3></center>
<hr>
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
<hr>
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
			<tbody id="tincidencia">

			</tbody>
		</table>
	</div>
	
</div>
@stop
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/insidencias.js"></script>
@stop
