<!doctype html>
<html>
<head> 
<title> REGISTRAR CLIENTE </title>
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
		$apellidoPat=$_POST['apellidoPat'];
		$apellidoMat=$_POST['apellidoMat'];
		$compania=$_POST['compa'];
		$calle=$_POST['calle'];
		$numero=$_POST['numero'];
		$colonia=$_POST['colonia'];
		$municipio=$_POST['municipio'];
		$estado=$_POST['estado'];
		$correo=$_POST['correo'];
		$proyecto=$_POST['proyecto'];
		$fecha = date("Y-m-d");

		$consulta = utf8_decode("insert into clientes(nombre, apellido_pat, apellido_mat,compania,calle,numero,colonia,municipio,
		estado, telefono,correo,proyecto,fecha_registro) 
		values ('$nombre', '$apellidoPat', '$apellidoMat', '$compania', '$calle', '$numero', '$colonia', '$municipio', 
			'$estado', '', '$correo', '$proyecto', '$fecha')");		
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
<meta http-equiv='refresh' content='0; url=clientes.php' />
</body>
</html>