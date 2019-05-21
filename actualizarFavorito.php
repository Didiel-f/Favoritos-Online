<?php
	session_start();

	$conexion = NEW PDO ('sqlite:'.'favoritos.db');

	$usuario = $_SESSION['usuario'] ;
	$contrasena = $_SESSION['contrasena'];

	$titulo = $_POST['titulo'];
	$direccion = $_POST['direccion'];
	$categoria = $_POST['categoria'];
	$comentario = $_POST['comentario'];
	$valoracion = $_POST['valoracion'];

	$tituloAntiguo = $_SESSION['titulo'];

	$consulta = $conexion->prepare("UPDATE favoritos SET titulo='".$titulo."', direccion= '".$direccion."', categoria= '".$categoria."', comentario= '".$comentario."', valoracion= '".$valoracion."' WHERE titulo='".$tituloAntiguo."'");

	$consulta->execute();

	$conexion=NULL;

	echo "
		<html>
			<head>
				<meta http-equiv='REFRESH' content='0;url=principal.php'>
			</head>
		</html>

	";


?>