<!DOCTYPE html>
<html>
<head>
@yield('styles')

<title>DSPVC</title>
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<meta id="token" value="{{csrf_token()}}"> 
  <link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app1.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
<header>
<ul id="dropdown1" class="dropdown-content">
<li><a href="/consultaincidenciaspD">Consultar Incidencias</a></li>
<li class="divider"></li>
<li><a href="/consultallamadasD">Consultar Llamadas</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
<li><a href="/consultaplacasfechaD">Consultar Vehículo</a></li>
<li class="divider"></li>
<li><a href="/consultagruasfechaD">Asegurados en Fecha</a></li>
<li class="divider"></li>
<li><a href="/consultaincidenciasvD">Consultar Incidencias</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
<li><a href="/consultadetenidoD">Consultar Internos</a></li>
<li class="divider"></li>
<li><a href="/segpub/barandilla/historialD">Historial de internos</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown4" class="dropdown-content">
<li><a href="/director/usuarios/registro">Agregar usuario</a> </li>
<li><a href="/director/usuarios/modificar">Modificar contraseñas</a> </li>
</ul>
<nav class="grey darken-4">
  <div class="nav-wrapper ">
    <img class="logo" src="/images/logo.png"><a href="/director" class="brand-logo form">&nbsp;SIGEI</a>
    <ul class="right hide-on-med-and-down">
    <li><a class="" href="/director" >Estadisticas&nbsp<i class="fa fa-pie-chart" aria-hidden="true"></i></a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Seg.Pública&nbsp;<i class="fa fa-chevron-down"></i></a></li>    
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Vialidad &nbsp; &nbsp;<i class="fa fa-chevron-down"></i></a></li> 
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Detenidos &nbsp &nbsp &nbsp<i class="fa fa-chevron-down"></i></a></li> 
       <li><a href="#!" class="dropdown-button" data-activates="dropdown4">Usuarios&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-down"></i></a></li>
      <li><a href="/logoutD">Director: {{session()->get('Admin')->nombre}} &nbsp&nbsp<i class="fa fa-sign-out"></i>Cerrar Sesión</a></li>

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
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script src="/js/app.js"></script>
@yield('script')
@yield('script2')
</body>
</html>