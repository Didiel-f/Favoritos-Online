<?php
	
	session_start();

	$conexion = new PDO('sqlite:'.'favoritos.db');

	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];


	$usuario = $_GET['usuario'];
	$contrasena = $_GET['contrasena'];
	$nombre = $_GET['nombre'];
	$apellido = $_GET['apellido'];
	$edad = $_GET['edad'];


	$consulta = $conexion->prepare("DELETE FROM usuarios WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND nombre= '".$nombre."' AND apellido= '".$apellido."' AND edad= '".$edad."'");

	$consulta->execute();

	$conexion=NULL;

	echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0;url=gestionUsuarios.php">
				</head>

			</html>
	';

?>