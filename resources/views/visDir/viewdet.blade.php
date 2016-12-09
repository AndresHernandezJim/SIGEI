@extends('templates.tdir2')

@section('content')

<center><h2>Barandillas</h2></center>
	<hr>
	
	<table class="centered bordered" id="app"><thead><tr><th>Imagen</th><th>Nombre</th><th>Ingresó</th><th>Detalles</th><th>Liberar</th></thead>
	<tbody >
		@foreach($detenidos as $detenido)
		<tr>
			<td>
			<img src="{{$detenido->foto}}" width="80px">
			</td>
			<td>
			{{$detenido->nombre." (".$detenido->alias.")"}}
			</td>
			<td>
			{{$detenido->created_at}}
			</td>
			<td>
			<a  href="/segpub/barandilla/infoD/{{$detenido->id}}" class="waves-effect waves-light btn"><i class="fa fa-info-circle aria-hidden="true"></i></a>	
			</td>
			<td>
			<a  v-on:click="borrar({{$detenido->id, $detenido}})" class="waves-effect waves-red btn disabled"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	{{$detenidos->links()}}

	
		

	
@stop

@section('script')
<script src="/js/barandilla2.js"></script>
@stop