<?php
	session_start();

	$conexion = NEW PDO ('sqlite:'.'favoritos.db');

	$usuarioAntiguo = $_SESSION['usuario'] ;

	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$edad = $_POST['edad'];

	$tituloAntiguo = $_SESSION['titulo'];

	$consulta = $conexion->prepare("UPDATE usuarios SET usuario='".$usuario."', contrasena= '".$contrasena."', nombre= '".$nombre."', apellido= '".$apellido."', edad= '".$edad."' WHERE usuario='".$usuarioAntiguo."'");

	$consulta->execute();

	$conexion=NULL;

	echo "
		<html>
			<head>
				<meta http-equiv='REFRESH' content='0;url=gestionUsuarios.php'>
			</head>
		</html>

	";


?>