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

#divcontacto{
    background-color: #b3e6ff;  
    box-shadow: 12;
    border-radius: 8px 8px 8px 8px;
    -moz-border-radius: 8px 8px 8px 8px;
    -webkit-border-radius: 8px 8px 8px 8px;
    border: 0px solid #000000;
    -webkit-box-shadow: 6px 7px 5px 1px rgba(0,0,0,0.52);
    -moz-box-shadow: 6px 7px 5px 1px rgba(0,0,0,0.52);
    box-shadow: 6px 7px 5px 1px rgba(0,0,0,0.52);
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
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><span class="glyphicon glyphicon-wrench"></span> Servicios</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="web.php">Web</a></li>
            <li><a href="escritorio.php">Desktop</a></li>
            <li><a href="moviles.php">Apps</a></li>
          </ul>
        </li>
        </li>
        <li><a href="nosotros.php"><b><span class="glyphicon glyphicon-user"></span> Nosotros</b><span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#"><b><span class="glyphicon glyphicon-envelope"></span> Contacto</b><span class="sr-only">(current)</span></a></li>
        
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
<br>
    
<div class="container">
    <div class="panel panel-primary">
  <div class="panel-heading"><b>P&oacute;ngase en contacto con nosotros</b></div>
  <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active">
                <a href="#redgen" data-toggle="tab" aria-hidden="true"><b>Su opini&oacute;n nos interesa</b></a>
                </li>
                <li>
                <a href="#dos" data-toggle="tab" aria-hidden="true"><b>Agende una cita</b></a>
                </li>
                <li>
                <a href="#tres" data-toggle="tab" aria-hidden="true"><b>Soporte</b></a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div id="redgen" class="tab-pane fade in active">
                    <br>
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-6" id="divcontacto">
                        <br>
                        <label>Nombre(s):</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese su Nombre" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Apellidos:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese sus Apellidos" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Correo Electr&oacute;nico:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese su direcci&oacute;n de e-mail" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Escriba su Mensaje / Sugerencia:</label><br>
                        <textarea placeholder="Escriba su mensaje" class="form-control" rows="6"></textarea>
                        <input type="checkbox"><label> Deseo recibir respuesta a mi correo.</label><br>
                        <div class="text-right">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Enviar</button>
                        </div>
                            <br>
                    </div>
                    <div class="col-lg-3 col-md-3"></div>
                </div>
                
                <div id="dos" class="tab-pane fade">
                                        <br>
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-6" id="divcontacto">
                        <br>
                        <label>Nombre(s):</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese su Nombre" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Apellidos:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese sus Apellidos" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Nombre de su Compa&ntilde;&iacute;a:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-apple"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese el Nombre de su Compa&ntilde;&iacute;a" aria-describedby="basic-addon1">
                        </div><br>
                        <label>N&uacute;mero Telef&oacute;nico:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-earphone"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese su n&uacute;mero telef&oacute;nico o de celular" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Correo Electr&oacute;nico:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese su direcci&oacute;n de e-mail" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Seleccione la fecha en que nos va a visitar:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="date" class="form-control" placeholder="Ingrese su n&uacute;mero telef&oacute;nico o de celular" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="form-group">
                            <label for="">&iquest;A qu&eacute; hora nos va a visitar?:</label>
                                <div class="input-group">
                                    <select class="form-control" placeholder="Horas">
                                        <option value="volvo">Horas</option>
                                        <option value="saab">09</option>
                                        <option value="opel">10</option>
                                        <option value="audi">11</option>
                                        <option value="audi">12</option>
                                        <option value="audi">13</option>
                                        <option value="audi">14</option>
                                        <option value="audi">15</option>
                                        <option value="audi">16</option>
                                    </select>
                                        <span class="input-group-addon"><b>:</b></span>
                                    <select class="form-control" placeholder="Minutos">
                                        <option value="volvo">Minutos</option>
                                        <option value="saab">00</option>
                                        <option value="opel">15</option>
                                        <option value="audi">30</option>
                                        <option value="audi">45</option>
                                    </select>
                                </div>
                        </div>
                        <label>Describa Brevemente el Motivo de su Visita:</label><br>
                        <textarea placeholder="Describa su Visita" class="form-control" rows="6"></textarea>
                        <input type="radio" name="respuesta" value="correo"><label> Deseo recibir confirmaci&oacute;n a mi correo.</label><br>
                        <input type="radio" name="respuesta" value="telefono"><label> Deseo recibir confirmaci&oacute;n a mi tel&eacute;fono.</label><br>
                        <div class="text-right">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-bookmark"></span> Agendar</button>
                        </div>
                            <br> 
                    </div>
                    <div class="col-lg-3 col-md-3"></div>
                </div>
                <div id="tres" class="tab-pane fade">
                                        <br>
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-6" id="divcontacto">
                        <br>
                        <label>Ingrese el N&uacute;mero de Folio del Producto Adquirido en Mustach:</label><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-file"></span></span>
                            <input type="text" class="form-control" placeholder="Ingrese el N&uacute;mero de Folio de su Producto" aria-describedby="basic-addon1">
                        </div><br>
                        <label>Describa Detalladamente el Problema que Presenta el Producto:</label><br>
                        <textarea placeholder="Describa Detalladamente el Problema" class="form-control" rows="18"></textarea><br>
                        <div class="text-right">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Enviar</button>
                        </div>
                            <br>
                    </div>
                    <div class="col-lg-3 col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <footer>
    <p align="center" style="color:white">Soluciones Inform&aacute;ticas a su medida<br>Ll&aacute;manos: (462) 69696969</p>
</footer>
    
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
