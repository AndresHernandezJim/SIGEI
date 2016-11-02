@extends('templates.tsegpub')
@section('content')
<center><h4>Historial</h4></center>
<hr>
<center><h5>Buscar persona por Nombre o curp</h5></center>
<div class="row">

		<form action="/segpub/barandilla/detper" method="POST">
			{{csrf_field()}}
			<div class="input-field col s4 offset-s1">
				<input type="text" name="nombre" id="nombre" class="validate" minlength="3">
				<label>Nombre</label>
				
			</div>
			<div class="input-field col s3 offset-s1">
				<input type="text" name="curp" id="tags" class="validate" minlength="3">
				<label>CURP</label>
			</div>
			<div class="row">
				<div class="input-field col s4 offset-s6">

					<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar &nbsp<i class="fa fa-search-plus" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</form>		
</div>
@stop
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var tags = [
	@foreach($personas as $val)
	"{{$val->curp}}",
	@endforeach
];

var nombre = [
	@foreach($personas as $val)
	"{{$val->nombre.", ".$val->apellido}}",
	@endforeach
];

</script>
<script src="/js/historial.js"></script>
@stop
