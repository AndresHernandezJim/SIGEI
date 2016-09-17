<!DOCTYPE html>
<html>
<head>
@yield('styles')

<title>DSPVC</title>
	<link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app1.css">
</head>
<body>
<header>
<ul id="dropdown1" class="dropdown-content">
<li><a href="/registroincidenciasp">Registrar Incidencia</a></li>
<li class="divider"></li>
<li><a href="/consultaincidenciasp">Consultar Incidencias</a></li>
<li class="divider"></li>
<li><a href="/consultallamadas">Consultar Llamadas</a></li>
<li class="divider"></li>
<li><a href="/consultahechos">Consultar Hechos</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
<li><a href="/registroincidenciavial">Registrar Incidencia</a></li>
<li class="divider"></li>
<li><a href="/consultaplacasfecha">Consultar Vehículo</a></li>
<li class="divider"></li>
<li><a href="/consultagruas">Vehículos Asegurados</a></li>
<li class="divider"></li>
<li><a href="/consultagruasfecha">Asegurados en Fecha</a></li>
<li class="divider"></li>
<li><a href="/liberarvehiculo">Liberar Vehículo</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
<li><a href="/registrobarandilla">Registrar Ingreso</a></li>
<li class="divider"></li>
<li><a href="/consultadetenido">Consultar Interno</a></li>
<li class="divider"></li>
<li><a href="/consultabarimagen">Imagen de Interno</a></li>
<li class="divider"></li>
<li><a href="/consultaaseguramiento">Aseguramientos</a></li>
<li class="divider"></li>
<li><a href="/liberardetenido">Liberar Detenido</a></li>
<li class="divider"></li>
</ul>
<nav class="grey darken-4">
  <div class="nav-wrapper ">
    <img class="logo" src="/images/logo.png"><a href="#!" class="brand-logo form">&nbspSICOI</a>
    <ul class="right hide-on-med-and-down">
	  <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Seg.Publica&nbsp<i class="fa fa-chevron-down"></i></a></li>    
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Vialidad &nbsp &nbsp<i class="fa fa-chevron-down"></i></a></li> 
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Detenidos &nbsp &nbsp &nbsp<i class="fa fa-chevron-down"></i></a></li> 
      <li><a href="/logoutp">{{session()->get('Policia')->nombre}} &nbsp&nbsp<i class="fa fa-sign-out"></i>Cerrar Sesión</a></li> 
    </ul>
  </div>
</nav>	
</header>
@yield('navegacion')
<div id="section" class="container">
  @yield('content')
</div>
<script src="/js/jquery-2.2.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
@yield('script')
</body>
</html>