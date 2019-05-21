<?php

	session_start();

	// Crear variables

	$usuario = $_SESSION['usuario'];
	$contrasena=$_SESSION['contrasena'];

	$addtitulo=    $_POST['titulo'];
	$adddireccion= $_POST['direccion'];
	$addcategoria= $_POST['categoria'];
	$addcomentario=$_POST['comentario'];
	$addvaloracion=$_POST['valoracion'];

	// Conexion

	$conexion = new PDO('sqlite:'.'favoritos.db');

	// Consulta

	$consulta = $conexion->prepare("INSERT INTO favoritos (usuario,contrasena,titulo,direccion,categoria,comentario,valoracion)
									VALUES ('$usuario','$contrasena','$addtitulo','$adddireccion','$addcategoria','$addcomentario','$addvaloracion');");

	// Ejecutar consulta
	$consulta->execute();

	//Cerrar
	$conexion=NULL;

	// Y vuelvo
	echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0;url=principal.php">
				</head>


			</html>
	';
?>