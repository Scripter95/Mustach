<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['user']) || empty($_POST['pass'])) {
            $error = "El Usuario o la Contraseña es incorrecta!";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['user'];
            $password=$_POST['pass'];

            $hashPass = password_hash($password, PASSWORD_BCRYPT);
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            include("conexion.php");
            $con=conectarse();

            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = $con->real_escape_string($username);
            $password = $con->real_escape_string($password);        

            // SQL query to fetch information of registerd users and finds user match.
            $consulta ="select * from usuarios where user='$username'";
            $query = $con->query($consulta);
            $rows = $query->num_rows;

            if ($rows == 1) {
                $r=$query->fetch_array();
                if (password_verify($password, $r['password'])) {                   
                    
                    $_SESSION['ok']=True;
                    $_SESSION['Usuario']=$username;
                    
                    $query->free();

                    header("location: usuarios.php"); // Redirecting To Other Page
                }
            } else {
                $error = "El Usuario o la Contraseña es incorrecta!";
                header("location: index.php"); 
            }
        }
    }
?>

<html>
   <head>
        <meta charset="uft-8">
       <meta name="viewport"
             content ="width=device-width, initial-scale=1">
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" href="css/carrusel.css" type="text/css">
       <link rel="stylesheet" href="css/estilo.css" type="text/css">
       
    </head> 
    <style type="text/css"> 

body { 
background-image: url(img/Fondo3.jpg); 
background-attachment: fixed; 
background-repeat: no-repeat; 
background-position: center center; 
} 

footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
    </style>
    <body background="img/Fondo3.jpg">
        <noscript>
            No est&aacute; activado el javascript
        </noscript>
        

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Mustach</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><b><span class="glyphicon glyphicon-home"></span> Incio</b><span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><span class="glyphicon glyphicon-wrench"></span> Servicios</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="web.phph">Web</a></li>
            <li><a href="escritorio.php">Desktop</a></li>
            <li><a href="#">Apps</a></li>
          </ul>
        </li>
        </li>
        <li><a href="nosotros.php"><b><span class="glyphicon glyphicon-user"></span> Nosotros</b><span class="sr-only">(current)</span></a></li>
        <li><a href="contacto.php"><b><span class="glyphicon glyphicon-envelope"></span> Contacto</b><span class="sr-only">(current)</span></a></li>
        
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span class="glyphicon glyphicon-log-in"></span>&nbsp; Iniciar Sesi&oacute;n</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label>Nombre de Usuario:</label><br>
                                                <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                                <input name="user" type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" aria-describedby="basic-addon1">
                                                </div>
										</div>
										<div class="form-group">
											 <label>Contrase&ntilde;a:</label><br>
                                                <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input name="pass" type="password" class="form-control" placeholder="Ingrese su Contrase&ntilde;a" aria-describedby="basic-addon1">
                                                </div>
                                             <div class="help-block text-right"><a href="">Has olvidado la Contrsae&ntilde;a?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" name="submit" class="btn btn-primary btn-block">Entrar</button>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								<b>Bienvenido!!</b>
							</div>
					 </div>
				</li>
			</ul>
        </li>
        
      </ul>
      <form class="navbar-form navbar-right">
        
            <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar en Mustach" size="25">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                    </span>
            </div><!-- /input-group -->

      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
<br>
<br>
<br>
<br>
<div class="container">
<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="img/Mustach1.jpg" alt="First slide">
                    <!-- Static Header -->
			    </div>
			    <div class="item">
			    	<img src="img/Mustach2.jpg" alt="Second slide">

			    </div>
			    <div class="item">
			    	<img src="img/Mustach3.jpg" alt="Third slide">

			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
</div>
    <br>
    
       <div class="container">
   <div class="jumbotron">
  <span class="glyphicon glyphicon-object-align-bottom"></span><h1>Aplicaciones Moviles!</h1>
  <p> </p>
 
</div>
        
       
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/appm1.png" alt="...">
      <div class="caption">
        <h3>Aplicacion 1</h3>
        <p>Es una aplicaci&oacute;n inform&aacute;tica dise&ntilde;ada para ser ejecutada en tel&eacute;fonos inteligentes, tabletas y otros dispositivos m&oacute;viles y que permite al usuario efectuar una tarea concreta de cualquier tipo,profes&iacute;onal, de ocio, educativas, de acceso a servicios, etc, facilitando las gestiones o actividades a desarrollar.</p>
        <p><a href="#" class="btn btn-primary" role="button"> <span class="glyphicon glyphicon-ok"></span> Servicio</a> </p>
      </div>
    </div>
  </div>

        
        
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/appm2.png" alt="...">
      <div class="caption">
        <h3>Aplicacion 2</h3>
        <p>Es una aplicaci&oacute;n inform&aacute;tica dise&ntilde;ada para ser ejecutada en tel&eacute;fonos inteligentes, tabletas y otros dispositivos m&oacute;viles y que permite al usuario efectuar una tarea concreta de cualquier tipo,profes&iacute;onal, de ocio, educativas, de acceso a servicios, etc, facilitando las gestiones o actividades a desarrollar.</p>
        <p><a href="#" class="btn btn-primary" role="button"> <span class="glyphicon glyphicon-ok"></span> Servicio</a></p>
      </div>
    </div>
  </div>

        
        
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/appm3.png" alt="...">
      <div class="caption">
        <h3>Aplicacion 3</h3>
        <p>Es una aplicaci&oacute;n inform&aacute;tica dise&ntilde;ada para ser ejecutada en tel&eacute;fonos inteligentes, tabletas y otros dispositivos m&oacute;viles y que permite al usuario efectuar una tarea concreta de cualquier tipo,profes&iacute;onal, de ocio, educativas, de acceso a servicios, etc, facilitando las gestiones o actividades a desarrollar.</p>
        <p> <a  href="#" class="btn btn-primary" role="button"> <span class="glyphicon glyphicon-ok"></span> Servicio</a></p>
      </div>
    </div>
  </div>
</div>
   
    
    
<br>

<footer>
    <p align="center" style="color:white">Soluciones Inform&aacute;ticas a su medida<br>Ll&aacute;manos: (462) 69696969</p>
</footer>
    
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
