<?php
error_reporting(E_ALL);
//variables para recuperar los datos

$id = $_POST["idUsuario"];

include("conexion.php");
$con=conectarse();
              
$query = $con->query("SELECT * FROM usuarios where id_usuario='$id'");
$rows = $query->num_rows;

if ($rows == 1) {
	$r=$query->fetch_array();
	?>
		<form class="form" role="form" method="post" action="usuario.php" accept-charset="UTF-8" id="login-nav">
							<div class="col-md-4 col-sm-3">
                                <br>
                                <label>Nombre(s): </label><br>
                                        <input name="nombre" type="text" value="<?php echo utf8_encode($r['nombre']); ?>" class="form-control" aria-describedby="basic-addon1">
                                        <input name="id" type="hidden" value="<?php echo $id; ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Apellido Paterno: </label><br>
                                        <input name="apellido_pat" type="text" value="<?php echo utf8_encode($r['apellido_pat']); ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Apellido Materno: </label><br>
                                <input type="text" name="apellido_mat" value="<?php echo utf8_encode($r['apellido_mat']); ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Tel&eacute;fono: </label><br>
                                <input name="telefono" type="text" value="<?php echo utf8_encode($r['telefono']); ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Correo Electr&oacute;nico: </label><br>
                                        <input name="correo" type="text" value="<?php echo utf8_encode($r['correo']); ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Nombre de Usuario: </label><br>
                                <input name="usuario" type="text" value="<?php echo utf8_encode($r['user']); ?>" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <label>Contrase&ntilde;a: </label><br>
                                <input name="contrasena" type="text" class="form-control" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <center><button type="submit" name="submitActualizar" class="btn btn-primary"><b><span class="glyphicon glyphicon-arrow-up"></span> Actualizar</b></button></center>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <br>
                                <center><button type="submit" name="submitEliminar" class="btn btn-primary"><b><span class="glyphicon glyphicon-remove"></span> Eliminar</b></button></center>
                            </div>
    </form>
     <?php
}
?>