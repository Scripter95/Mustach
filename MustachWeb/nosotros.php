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
        <li><a href="index.php"><b><span class="glyphicon glyphicon-home"></span> Inicio</b><span class="sr-only">(current)</span></a></li>
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
        <li class="active"><a href="#"><b><span class="glyphicon glyphicon-user"></span> Nosotros</b><span class="sr-only">(current)</span></a></li>
        <li><a href="contacto.php"><b><span class="glyphicon glyphicon-envelope"></span> Contacto</b><span class="sr-only">(current)</span></a></li>
        
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span class="glyphicon glyphicon-log-in"></span>&nbsp; Iniciar Sesi&oacute;n</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
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
    <div class="panel-group" col-xs-12 id="acordeon">
                
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#acordeon" href="#persiana1">
                    <span class='glyphicon glyphicon-equalizer'></span> Nuestro Organigrama
                </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" id="persiana1">
                <div class="panel-body">
                    <center><img src="img/Organigrama.png" class="img-thumbnail"></center>
                </div>
            </div>
                </div>
                
            <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#acordeon" href="#persiana2">
                    <span class='glyphicon glyphicon-hourglass'></span> Un poco de Historia sobre Mustach Technologies
                </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" id="persiana2">
                <div class="panel-body">
                    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-justify">
                <p>La idea de formar una compa&ntilde;&iacute;a de desarrollo de software surgi&oacute; exactamente durante el tercer
                    semestre de carrera (a&ntilde;o 2014), cuando nos dimos cuenta de que cada integrante de nuestro c&iacute;rculo de amistades ten&iacute;a talentos muy particulares y que juntos pod&iacute;amos crear cosas realmente sorprendentes si combinabamos nuestro inter&eacute;s compartido por el mundo de la computaci&oacute;n.</p>
                <p>Sin embargo, fue hasta el quinto semestre (a&ntilde;o 2015) cuando decidimos crear una marca para lo que m&aacute;s tarde ser&iacute;a nuestra propia compa&ntilde;&iacute;a de desarrollo. De entre tantas propuestas que hicimos, la que m&aacute;s nos agrad&oacute; fue la imagen de un mostacho, ya que somos un equipo formado unicamente de hombres y adem&aacute;s el mostacho es un &iacute;cono referente de la nacionalidad mexicana, &iexcl;no hay nada m&aacute;s mexicano que un bigote!.</p>
                <p>Una vez que tubimos el logotipo definido, lo siguiente fue buscar un nombre tentativo para la compa&ntilde;&iacute;a, fue entonces que despu&eacute;s de varios intentos, una de las palabras que m&aacute;s nos hac&iacute;a reir (y hac&iacute;a referencia al logotipo) fue MUSTACH. El nombre se convirti&oacute; en el definitivo cuando nos dimos cuenta de que cuando la gente lo escuchaba se reia mucho (por alguna raz&oacute;n causaba mucha gracia) y fue algo que quisimos seguir experimentando "Cada vez que alguien mencione el nombre de Mustach cambie su semblante por uno de alegr&iacute;a descomunal".</p>
                <p>De ah&iacute; en m&aacute;s, absolutamente todos los proyectos que preparabamos para nuestras clases de la carrera se trabajaban bajo el nombre de "Mustach Technologies" y cuando los presentabamos ante nuestro grupo de clases, las risas no se hac&iacute;an esperar con el simple hecho de mencionar el nombre y mostrar el logo de la compa&ntilde;&iacute;a ("Misi&oacute;n Cumplida").</p>
                <p>Un buen d&iacute;a ya en el octavo semestre de carrera (a&ntilde;o 2017) decidimos comenzar con las formalidades para hechar a andar este fant&aacute;stico proyecto, nos pusimos en busca de convocatorias para concursar en eventos en los que pudi&eacute;ramos demostrar de lo que eramos capaces y al mismo tiempo buscamos el apoyo en diferentes sectores para obtener asesor&iacute;as sobre lo que ten&iacute;amos que hacer para establecernos como una compa&ntilde;&iacute;a real.</p>
            </div>
        </div>
                </div>
                </div>
                </div>   
                
            </div>
</div>
    
<div class="container">
    <div class="row">
        <h3>&nbsp;&nbsp;<span class="label label-primary">Conoce al Equipo de Trabajo</span></h3><br>
    </div>
</div>
    
<div class="container">
    <div class="row">
     <div class="col-sm-10 col-sm-offset-1">
         <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="img/PortadaAntonio.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="img/Antonio/perfilAntonio.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">&Aacute;ngel Antonio</h3>
                                <p class="profession">Camacho Jim&eacute;nez</p>
                                <p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i>Gerente General
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"Soluciones Inform&aacute;ticas a su medida"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Descripci&oacute;n del Trabajo</h4>
                                <p class="text-center">Encargado de <span class="label label-primary">llevar a cabo</span> el levantamiento de requerimientos con los clientes, as&iacute; como <span class="label label-primary">gestionar</span> el papeleo generado por el proceso de desarrollo.</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            Gerente General
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="img/PortadaFrancisco.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="img/Francisco.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Francisco Omar</h3>
                                <p class="profession">Rodr&iacute;guez L&oacute;pez</p>
                                <p class="text-center">"Lamborghini Mercy <br>Your chick she so thirsty <br>I'm in that two seat Lambo"</p>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-mail-forward"></i> Programador
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Descripci&oacute;n del Trabajo</h4>
                                <p class="text-center">Encargado de la <span class="label label-primary">codificaci&oacute;n</span>, <span class="label label-primary">an&aacute;lisis</span> de los requerimientos y las <span class="label label-primary">actualizaciones</span> de los proyectos.</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            Programador
                            <div class="social-links text-center">
                                <a href="http://deepak646.blogspot.in/" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="http://deepak646.blogspot.in/" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="http://deepak646.blogspot.in/" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="img/PortadaMiguel.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="img/Miguel.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Miguel &Aacute;ngel</h3>
                                <p class="profession">P&aacute;ramo Y&aacute;&ntilde;ez</p>

                                <p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-mail-forward"></i> Desarrollo Web
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Descripci&oacute;n del Trabajo</h4>
                                <p class="text-center">Responsable de <span class="label label-primary">dise&ntilde;ar</span> las interfaces de los proyectos, los logotipos y cualquier otro elemento relacionado con arte del nuevo sistema.</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers 
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            Desarrollo Web
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col-sm-3 -->
        </div> <!-- end col-sm-10 -->
    </div> <!-- end row -->
        
                    
<div class="row">
     <div class="col-sm-10 col-sm-offset-1">
         <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="img/PortadaEduardo.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="img/Baeza.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Jes&uacute;s Eduardo</h3>
                                <p class="profession">Baeza Castillo</p>
                                <p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i> Programador
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Descripci&oacute;n del Trabajo</h4>
                                <p class="text-center">Especialista en bases de datos, l&oacute;gica de programaci&oacute;n, seguridad inform&aacute;tica y redes de computadoras</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            Programador
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="http://hdwallpaperbackgrounds.net/wp-content/uploads/2015/07/HD-Wallpapers-dambo-the-bottle-funny-situation-image.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="img/Palafox.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Cristian Ra&uacute;l</h3>
                                <p class="profession">Aldaco Palafox</p>
                                <p class="text-center">"Lamborghini Mercy <br>Your chick she so thirsty <br>I'm in that two seat Lambo"</p>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-mail-forward"></i> Dise&ntilde;o de Sistemas
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Descripci&oacute;n del Trabajo</h4>
                                <p class="text-center">Encargado de <span class="label label-primary">analizar</span> ciertos requerimientos del sistema para <span class="label label-primary">dise&ntilde;ar</span> los diagramas de secuencia, de entidad relaci&oacute;n, de clases, casos de uso, etc.</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            Dise&ntilde;o de Sistemas
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        </div> <!-- end col-sm-10 -->
    </div> <!-- end row -->
</div>

<footer>
    <p align="center" style="color:white">Soluciones Inform&aacute;ticas a su medida<br>Ll&aacute;manos: (462) 69696969</p>
</footer>
    
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
       
         <script type="text/javascript">
            
             $().ready(function(){
                 $('[rel="tooltip"]').tooltip();

             });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
             
        </script>

    </body>
</html>