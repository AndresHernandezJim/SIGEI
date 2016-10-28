@extends('templates.tsegpub')

@section('content')
<div  class="row">
	
		<center><h2>Barandillas</h2></center>
	<hr>
	<table class="striped" id="app"><thead><tr><th>Apellido</th><th>Nombre</th><th>Información</th><th>Eliminar</th></thead>
	<tbody >
		@foreach($detenidos as $detenido)
		<tr>
			<td>
			{{$detenido->apellido}}
			</td>
			<td>
			{{$detenido->nombre}}
			</td>
			<td>
				<img src="{{$detenido->foto}}" width="80px">
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	

</div>
	
@stop