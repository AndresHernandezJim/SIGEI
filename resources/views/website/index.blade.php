<!DOCTYPE html>
<html>
<head>
	<title>SICOI</title>
	<link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<header>
<section>
    <center>
        <div class="col s12">
            <img src="/images/banner.png" class="responsive-img imgheader">
         </div>
         <div><a href="/registro">registrar</a></div>
    </center>
</section>
</header>

<center>
    <div class="container l6 div-index z-depth-4">
    <center>
        <div class="row">
            <div class="col s12">
             <h2 class="center-align">Ingresar</h2>
             @if(Session::has('error'))
              <p class="error">Usuario y/o Contraseña no coinsiden</p>
            @endif
                <form id="form" method="POST" action="/login">
                 {{ csrf_field() }}
                 
                    <div class="input-field col s12">
                        <input id="usuario" type="text" class="validate" name="usuario">
                        <label id="texto" for="usuario"><i class="fa fa-user"></i>  Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="pass" type="password" class="validate" name="password">
                        <label id="texto" for="contra"><i class="fa fa-key"></i>  Contraseña</label>
                    </div><br>
                    <div class="divider"></div><br>
                    <div class="row">
                        <div class="col s12">
                            <p class="center-align">
                             <button type="submit" class="btn btn-large waves-effect waves-light" type="button" name="action">ingresar &nbsp<i class="fa fa-arrow-right"></i></button>
                             </p> 
                    </button>
                </form>
            </div>
        </div>
    </center>
</div>    
</center>

    <script src="/js/jquery-2.2.1.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>