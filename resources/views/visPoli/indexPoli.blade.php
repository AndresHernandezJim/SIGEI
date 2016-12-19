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
     
  }
  .rigthleft{
    height: 100vh;
    
  }
  .top{
    height: 25vh;
    
  }
  .bott{
    height: 33vh;
    
  }
  .mid{
    height: 41vh;

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
        <div class="top"></div>
        <div class="mid" id="uno"></div>
    </div>
    <div class="center col s4">
        <div class="top"></div>
        <div class="mid"></div>
    </div>
    <div class="rigthleft col s4">
        <div class="top"></div>
        <div class="mid" id="dos"></div>
    </div>
  </div>
    
  </div>
<script src="/js/jquery-2.2.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(uno);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(dos);
      function uno() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          @foreach($uno as $item)
            ['{{$item->nombre}}', {{$item->cantidad}}],
          @endforeach
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Tipos de atencion de llamadas en el mes',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('uno'));
        chart.draw(data, options);
      }
      function dos() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          @foreach($dos as $item)
            ['{{$item->emergencia}}',{{$item->cantidad}}],
          @endforeach
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Top 10 Tipo de emergencias Atendidaa en el mes',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('dos'));
        chart.draw(data, options);
      }
    </script>
@yield('script')
</body>
</html>