<?php
	
	session_start();

	$conexion = new PDO('sqlite:'.'favoritos.db');

	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];


	$titulo = $_GET['titulo'];
	$direccion = $_GET['direccion'];
	$categoria = $_GET['categoria'];
	$comentario = $_GET['comentario'];
	$valoracion = $_GET['valoracion'];


	$consulta = $conexion->prepare("DELETE FROM favoritos WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND titulo= '".$titulo."' AND direccion= '".$direccion."' AND categoria= '".$categoria."' AND comentario= '".$comentario."' AND valoracion= '".$valoracion."'");

	$consulta->execute();

	$conexion=NULL;

	echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0;url=principal.php">
				</head>

			</html>
	';

?>