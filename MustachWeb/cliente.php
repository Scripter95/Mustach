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
		$nombre=$_POST['nom'];
		$apellidoPat=$_POST['apellido_pat'];
		$apellidoMat=$_POST['apellido_mat'];
		$compania=$_POST['compania'];		
		$correo=$_POST['correo'];
		$proyecto=$_POST['proyecto'];

	if(isset($_POST['submitEliminar']))
	{
		include("conexion.php");
		$con=conectarse();

		$consulta = utf8_decode("delete from clientes where nombre='$nombre' and apellido_pat='$apellidoPat' 
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

		$consulta = utf8_decode("update clientes set nombre='$nombre', apellido_pat='$apellidoPat',apellido_mat='$apellidoMat',
			compania='$compania',correo='$correo',proyecto='$proyecto' where id_cliente=$id");						
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
<meta http-equiv='refresh' content='1; url=clientes.php' />
</body>
</html>