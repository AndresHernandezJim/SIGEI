<!DOCTYPE html>
<html>
<head>
	<title>Ingresar usuario</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<header>
		<section>
    		<center>
       			 <div class="col s10">
            		<img src="/images/banner.png" class="responsive-img imgheader">
        		 </div>
         		
    		</center>
		</section>
	</header>

	<div id="section" class="container">
  		@yield('content')
	</div>
	<script src="/js/jquery-2.2.1.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>