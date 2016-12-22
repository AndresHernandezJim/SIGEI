@extends('templates.tdir')

@section('content')
	<div class="row">
		<div class="col s12">
			<center>
				<h5>Ingrese el nombre de usuario nick</h5>
			</center>
			<hr>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="input-field col s4 offset-s3">
			<input type="text" name="usuario">
			<label>Usuario o ninckname</label>
		</div>
		<div class="col s3 offset-s1">
			<a href="" class="btn">Buscar&nbsp;<i class="fa fa-search" aria-hidden="true"></i></a>
		</div>
	</div>
@stop

