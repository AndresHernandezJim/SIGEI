@extends('templates.tsegpub2')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Vehiculo</a>
    </div>
  </div>
  
@stop
@section('content')
<center><h3>Consulta de Vehiculo</h3></center>
 <hr>
<div class="row">
 	<form>
 	{{csrf_field()}}
 		<div class="col s12">
 		<br>
 			<div class="row">
 				<div class="col s3 offset-s2" >
 					<input type="text" id="plac" name="Placas">
 					<label>Número de placa</label>
 				</div>
 				<div class="col s1 offset-s1">
 				<br>
 					<a id="enviar" class="btn">Buscar</a>
 				</div>
 			</div>
 		</div>
 	</form>	
</div>
<hr>
<div id="efect" class="row">
	<br>
		<h4>Detalles del vehiculo</h4>
	<br>
	<div class="col s">
		<input type="text" name="modelo" id="modelo" class="validate" readonly="">
		<label>modelo</label>
	</div>
	<div class="col s">
		<input type="text" name="anii" id="anii" class="validate" readonly="">
		<label>Año</label>
	</div>
	<div class="col s">
		<input type="text" name="tipo" id="tipo" class="validate" readonly="">
		<label>tipo</label>
	</div>
	<div class="col s">
		<input type="text" name="estado" id="estado" class="validate" readonly="">
		<label>estado</label>
	</div>
	<div class="col s">
		<input type="text" name="placas" id="placas" class="validate" readonly="">
		<label>placas</label>
	</div>
	<div class="col s">
		<input type="text" name="liberado" id="liberado" class="validate" readonly="">
		<label>liberado</label>
	</div>
	<div class="col s">
		<input type="text" name="ubicacion" id="ubicacion" class="validate" readonly="">
		<label>ubicacion</label>
	</div>
	<div class="col s">
		<input type="text" name="adeudo" id="adeudo" class="validate" readonly="">
		<label>adeudo</label>
	</div>
	<div class="col s8">
		<input type="text" name="detalles" id="detalles" class="validate" readonly="">
		<label>detalles</label>
	</div>
	<div class="col s">
		<input type="text" name="reg" id="regsitro" class="validate" readonly="">
		<label>Fecha de registro</label>
	</div>
	<div class="col s" id="feclibdiv">
		<input type="text" name="libre" id="feclibe" class="validate" readonly="">
		<label>Fecha de liberado</label>
	</div>
	<div class="col s2 offset-s10">
	<br><br>
	<a id="liberar" class="btn">Liberar</a>
	<input type="hidden" id="idv" name="id">	
	</div>
</div>
	
</div>

@stop
@section('script')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var placas = [
	@foreach($placas as $val)
	 "{{$val->placas}}",
	@endforeach
];
</script>
<script src="/js/vehiculo.js"></script>
@stop
