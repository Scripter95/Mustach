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

	if(isset($_POST['submit']))
	{
		include("conexion.php");
		$con=conectarse();

		$nombre=$_POST['nombre'];
		$apellidoPat=$_POST['apellido_pat'];
		$apellidoMat=$_POST['apellido_mat'];
		$telefono=$_POST['telefono'];		
		$correo=$_POST['correo'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];

		$hash = password_hash($contrasena, PASSWORD_BCRYPT);

		$consulta = utf8_decode("insert into usuarios(nombre, apellido_pat, apellido_mat, correo, telefono, user, password) 
		values ('$nombre', '$apellidoPat', '$apellidoMat', '$correo', '$telefono', '$usuario', '$hash')");		
		$result=$con->query($consulta);
	
		if($result>=1)
		{
			echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
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