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
                <li>
                    <a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Usuarios</a>
                </li>
                <li class="active">
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
                    <a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesi&oacute;n</a>
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
                            <h3 class="panel-title"><b>Clientes</b></h3>
                        </div>
                        <div class="panel-body">
                             <ul class="nav nav-tabs">
                <li class="active">
                <a href="#redgen" data-toggle="tab" aria-hidden="true"><b>Nuevo Cliente</b></a>
                </li>
                <li>
                <a href="#dos" data-toggle="tab" aria-hidden="true"><b>Consultar Clientes</b></a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div id="redgen" class="tab-pane fade in active">
                    <form class="form" role="form" method="post" action="registrar_cliente.php" accept-charset="UTF-8" id="login-nav">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Nombre(s): </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="nombre" maxlength="40" type="text" class="form-control" placeholder="Ingrese el Nombre(s) de Pila" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Apellido Paterno: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="apellidoPat" maxlength="20" type="text" class="form-control" placeholder="Ingrese Apellido Materno" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label>Apellido Materno: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="apellidoMat" maxlength="20" type="text" class="form-control" placeholder="Ingrese Apellido Paterno" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Compa&ntilde;&iacute;a: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="compa" maxlength="50"type="text" class="form-control" placeholder="Ingrese Nombre de la Compa&ntilde;&iacute;a" aria-describedby="basic-addon1" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Calle: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="calle" maxlength="30" type="text" class="form-control" placeholder="Ingrese la Calle del Domicilio del Cliente" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>N&uacute;mero: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="numero" maxlength="10" type="text" pattern="[0-9]{1,}$" class="form-control" placeholder="Ingrese el N&uacute;mero de residencia" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Colonia: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="colonia" maxlength="30" type="text" class="form-control" placeholder="Ingrese la Colonia de Residencia" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Municipio: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="municipio" maxlength="30" type="text" class="form-control" placeholder="Ingrese el Municipio de Residencia" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <label>Estado: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="estado" maxlength="30" type="text" class="form-control" placeholder="Ingrese el Estado de Residencia" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Correo: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="correo" maxlength="40" type="text" class="form-control" placeholder="Ingrese un Correo Electr&oacute;nico" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Nombre de Proyecto: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="proyecto" maxlength="40" type="text" class="form-control" placeholder="Ingrese Nombre del Proyecto" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label>Fecha de Registro: </label><br>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="fecha" maxlength="40" type="text" class="form-control" aria-describedby="basic-addon1" disabled="true">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br><br>
                                   <center><button type="submit" name="submit" class="btn btn-primary"><b><span class="glyphicon glyphicon-ok"></span> Registrar Cliente</b></button></center> 
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
                        
                        $result=$con->query("SELECT * FROM clientes");
                        if($result->num_rows > 0)
                        {
                ?>
                                 <table class="table table-responsive" border="1">
        		<thead>
        			<tr>
                        <th>#</th>
        				<th>Nombre</th>
                        <th>Empresa</th>
        				<th>Consultar</th>
        			</tr>
        		</thead>
                <?php
                while($row = $result->fetch_array())
                {
                    $id = $row['id_cliente'];
                ?>
        		<tbody>
                    <tr>
                         <td align="center"><?php echo $row['id_cliente']; ?></td>
                         <td align="center"><?php echo utf8_encode($row['nombre'].' '.$row['apellido_pat'].' '.$row['apellido_mat']); ?></td>
                         <td align="center"><?php echo $row['compania']; ?></td>
                         <td align="center">                             
                            <button id="<?php echo $id; ?>" class="btn btn-success" onclick="capturaDatosCliente('<?php echo $id; ?>')">Ok</button>
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
    <script src="js/clientes.js" type="text/javascript"></script>  

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