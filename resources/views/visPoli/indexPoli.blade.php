<!DOCTYPE html>
<html>
<head>
@yield('styles')
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<style>
/* para quitar las lineas eliminar la propiedad border de cada clase*/
  .wrap{
    width: 100%;
    margin: 0 auto;
  }
  .leftrigth{
    height: 100vh;
     border-right: 1px solid;
  }
  .rigthleft{
    height: 100vh;
    border-left: 1px solid; 
  }
  .top{
    height: 50vh;
    border-bottom: 1px solid;
  }
  .bott{
    height: 50vh;
    border-top: 1px solid;
  }
  .center{
    height: 100vh;
  }
</style>

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
</ul>
<ul id="dropdown2" class="dropdown-content">
<li><a href="/registroincidenciavial">Registrar Incidencia</a></li>
<li class="divider"></li>
<li><a href="/consultaplacasfecha">Consultar Vehículo</a></li>
<li class="divider"></li>
<li><a href="/consultagruasfecha">Asegurados en Fecha</a></li>
<li class="divider"></li>
<li><a href="/consultaincidenciasv">Consultar Incidencias</a></li>
<li class="divider"></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
<li><a href="/registrobarandilla">Registrar Ingreso</a></li>
<li class="divider"></li>
<li><a href="/consultadetenido">Consultar Interno</a></li>
<li class="divider"></li>
<li><a href="/segpub/barandilla/historial">Aseguramientos</a></li>
<li class="divider"></li>
</ul>
<nav class="grey darken-4">
  <div class="nav-wrapper ">
    <img class="logo" src="/images/logo.png"><a href="#!" class="brand-logo form">&nbsp;SIGEI</a>
    <ul class="right hide-on-med-and-down">
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Seg.Publica&nbsp<i class="fa fa-chevron-down"></i></a></li>    
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Vialidad &nbsp &nbsp<i class="fa fa-chevron-down"></i></a></li> 
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Detenidos &nbsp &nbsp &nbsp<i class="fa fa-chevron-down"></i></a></li> 
      <li><a href="/logoutp">{{session()->get('Policia')->nombre}} &nbsp&nbsp<i class="fa fa-sign-out"></i>Cerrar Sesión</a></li> 
    </ul>
  </div>
</nav>  
</header>
  <div class="wrap">
  <div class="row">
    <div class="leftrigth col s4">
        <div class="top">
          
        </div>
        <div class="bott">
          
        </div>
    </div>
    <div class="center col s4">
        <div class="top">
          
        </div>
        <div class="bott">
          
        </div>
    </div>
    <div class="rigthleft col s4">
     <div class="top">
          
        </div>
        <div class="bott">
          
        </div>
       
    </div>
  </div>
    
  </div>
<script src="/js/jquery-2.2.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
@yield('script')
</body>
</html>