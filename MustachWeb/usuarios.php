<?php
session_start();
if($_SESSION['ok']==True)
{
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuarios</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/navLateral.css" rel="stylesheet">
     <link href="css/estilo.css" rel="stylesheet">


</head>
    
        <style type="text/css"> 

body { 
background-image: url(img/Fondo2.jpg); 
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

<body>

    <div id="wrapper">
        
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Mustach
                    </a>
                </li>
                <li>
                    <a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
                </li>
                <li class="active">
                    <a href="#"><span class="glyphicon glyphicon-user"></span> Usuarios</a>
                </li>
                <li>
                    <a href="clientes.php"><span class="glyphicon glyphicon-list-alt"></span> Clientes</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-map-marker"></span> Visitantes</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-cog"></span> Soporte</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-comment"></span> Comentarios</a>
                </li>
                <li>
                    <a href="close.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesi&oacute;n</a>
                </li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                    <a href="#menu-toggle" class="btn btn-info" id="menu-toggle"><b><span class="glyphicon glyphicon-menu-hamburger"></span> Men&uacute;</b></a>
                        <br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Usuarios</b></h3>
                        </div>
                        <div class="panel-body">
                             <ul class="nav nav-tabs">
                <li class="active">
                <a href="#redgen" data-toggle="tab" aria-hidden="true"><b>Nuevo Usuario</b></a>
                </li>
                <li>
                <a href="#dos" data-toggle="tab" aria-hidden="true"><b>Consultar</b></a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div id="redgen" class="tab-pane fade in active">                    
                    <form class="form" role="form" method="post" action="registrar_usuario.php" accept-charset="UTF-8" id="login-nav">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Nombre(s): </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input id="nombre" name="nombre" maxlength="40" type="text" class="form-control" placeholder="Ingrese el Nombre(s) de Pila" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Apellido Paterno: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="apellido_pat" maxlength="20" type="text" class="form-control" placeholder="Ingrese Apellido Materno" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Apellido Materno: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="apellido_mat" maxlength="20" type="text" class="form-control" placeholder="Ingrese Apellido Paterno" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Tel&eacute;fono: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="telefono" maxlength="30" type="text" class="form-control" placeholder="Ingrese un N&uacute;mero Telef&oacute;nico" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Correo Electr&oacute;nico: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="correo" maxlength="40" type="text" class="form-control" placeholder="Ingrese un Correo Electr&oacute;nico" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Nombre de Usuario para el Sistema: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="usuario" maxlength="20" type="text" class="form-control" placeholder="Ingrese el Nombre de Usuario" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Contrase&ntilde;a del Usuario: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="contrasena" maxlength="20" type="text" class="form-control" placeholder="Contrase&ntilde;a del Usuario" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br><br>
                                   <center><button type="submit" name="submit" class="btn btn-primary"><b><span class="glyphicon glyphicon-ok"></span> Registrar Usuario</b></button></center> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="dos" class="tab-pane fade">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <?php                
                    if(!isset($_POST['submit']))
                    {
                        include("conexion.php");
                        $con=conectarse();
                        
                        $result=$con->query("SELECT * FROM usuarios");
                        if($result->num_rows > 0)
                        {
                ?>
                                 <table class="table table-responsive" border="1">
        		<thead>
        			<tr>
                        <th>#</th>
        				<th>Nombre</th>
        				<th>Consultar</th>
        			</tr>
        		</thead>
                <?php
                while($row = $result->fetch_array())
                {
                    $id = $row['id_usuario'];                    
                ?>
        		<tbody>                                   
                    <tr>
                     <td align="center" id="tdId"><?php echo $row['id_usuario']; ?></td>
                     <td align="center"><?php echo utf8_encode($row['nombre'].' '.$row['apellido_pat'].' '.$row['apellido_mat']); ?></td>
                     <td align="center">
                        <button id="<?php echo $id; ?>" class="btn btn-success" onclick="capturaDatosUsuario('<?php echo $id; ?>')">Ok</button>
                     </td>
                    </tr>
                <?php
                }
                ?>      
                    
        		</tbody>
        	</table>
            
                            </div>
                            <?php
                }      
                }          
            ?>
            <div class="col-md-6">
                            
                        </div>
                        </div>

    <div id="respuesta" class="row">
    
    </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                         
                                
                                
                </div>
            </div>
        </div>

    </div>
    <script src="js/jquery-3.1.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>    
    <script src="js/usuarios.js" type="text/javascript"></script>  

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
<?php
}
else
{
    header("location: index.php");
}
?>
</html>