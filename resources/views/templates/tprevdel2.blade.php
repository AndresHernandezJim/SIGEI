<!DOCTYPE html>
<html>
<head>
  <title>Prevención del Delito</title>
  <base href="{{asset('/')}}/">
  <meta id="token" value="{{csrf_token()}}"> 
  <link rel="shortcut icon" href="/images/prevdel.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app2.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
@yield('head')
</head>
<body >
<header>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="{{url('predel/new/persona')}}">Registro</a></li>
      <li class="divider"></li>
      <li><a href="/predel/show/pacientes">Consultas</a></li>
      <li class="divider"></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="{{url('/predel/new/institucion')}}">Registro</a></li>
      <li class="divider"></li>
      <li><a href="/predel/show/institucion">Consultas</a></li>
      <li class="divider"></li>
    </ul>
    </ul>
  <nav class="deep-orange darken-4">
    <div class="nav-wrapper ">
      <img class="logo" src="/images/logo.png"><a href="/predel" class="brand-logo form">&nbspSIGEI</a>
      <ul class="right hide-on-med-and-down">
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Personas&nbsp<i class="fa fa-chevron-down"></i></a></li>    
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Instituciones&nbsp<i class="fa fa-chevron-down"></i></a></li> 
        <li><a href="/logoutpd">{{session()->get('Psicologo')->nombre}} &nbsp&nbsp<i class="fa fa-sign-out"></i>Cerrar Sesión</a></li> 
      </ul>
    </div>
  </nav>  
</header>
@yield('navegacion')
<div class="row">
  <div class="col s10 offset-s1">
    <div class="card-panel lime lighten-5">
      @yield('content')
    </div>
  </div>
</div>
  
<script src="/js/jquery-2.2.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script src="/js/app.js"></script>
@yield('script')
</body>
</html>