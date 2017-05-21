<?php
	function conectarse()
	{
		$mysqli = new mysqli("localhost", "root", "opusdei", "mustachdb");	
		if ($mysqli->connect_errno)
		{
			echo'ERROR CONECTANDO CON EL SERVIDOR: ' . $mysqli->connect_errno ;
			exit();
		}

		return $mysqli;
	}

conectarse();
?>
