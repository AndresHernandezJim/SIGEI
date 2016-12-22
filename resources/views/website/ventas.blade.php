@extends('templates.base')
@section('content')
<center><h3>Ventass</h3></center>
<hr>
<div class="row">
	<div class="col s3">
		<h4>Facturación media por venta:<h4>
	</div>
	<div class="col s3 offset-s3">
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
</div>
@stop