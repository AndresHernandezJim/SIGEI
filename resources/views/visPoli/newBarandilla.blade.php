@extends('templates.tsegpub')
@section('content')
<center><h3>Detenido</h3></center>
<hr>
<form>
	{{csrf_field()}}
	<div class="row">
			<div class="input field col s3 offset-s1">
				<input type="text" name="nombre" id="nombre">
				<label>Nombre</label>
			</div>
	</div>
</form>
@stop