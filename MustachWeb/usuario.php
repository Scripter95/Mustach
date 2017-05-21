<!doctype html>
<html>
<head> 
<title> REGISTRAR USUARIO </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body bgcolor="#337ab7">
<style>
h1   {color:#fff}
</style>

<?php

		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$apellidoPat=$_POST['apellido_pat'];
		$apellidoMat=$_POST['apellido_mat'];
		$telefono=$_POST['telefono'];		
		$correo=$_POST['correo'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];

	if(isset($_POST['submitEliminar']))
	{
		include("conexion.php");
		$con=conectarse();

		$consulta = utf8_decode("delete from usuarios where nombre='$nombre' and apellido_pat='$apellidoPat' 
			and apellido_mat='$apellidoMat'");				
		$result=$con->query($consulta);
	
		if($result>=1)
		{
			echo "<center><h1> DATOS ELIMINADOS CON EXITOS</h1></center>";
		}
		else
		{
			echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
		}
	}
	else if(isset($_POST['submitActualizar']))
	{
		include("conexion.php");
		$con=conectarse();

		$hash = password_hash($contrasena, PASSWORD_BCRYPT);

		$consulta = utf8_decode("update usuarios set nombre='$nombre', apellido_pat='$apellidoPat',apellido_mat='$apellidoMat',
			telefono='$telefono',correo='$correo',user='$usuario',password='$hash' where id_usuario=$id");						
		$result=$con->query($consulta);
	
		if($result>=1)
		{
			echo "<center><h1> DATOS MODIFICADOS CON EXITOS</h1></center>";
		}
		else
		{
			echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
		}
	}
	else{
			echo "<center><h1>ERROR</h1></center>";
	}
?>
<meta http-equiv='refresh' content='1; url=usuarios.php' />
</body>
</html>