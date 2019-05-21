<?php
	session_start();
	// Obtener variables

	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	// Creamos conexion
	$conexion = new PDO('sqlite:'.'favoritos.db');

	// Consulta
	$consulta = $conexion->prepare("SELECT * FROM usuarios;");

	// Lanzar la consulta
	$consulta->execute();

	// Repasar los resultados
	while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {

		$usuariobasedatos = $fila['usuario'];
		$contrasenabasedatos = $fila['contrasena'];
		$permisosbasedatos = $fila['permisos'];
		if ($usuario == $usuariobasedatos & $contrasena == $contrasenabasedatos){

	// Si el resultado es positivo, entonces asignar
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			$_SESSION['permisos'] = $permisosbasedatos;

			echo'
				<html>
					<head>
						<meta http-equiv="REFRESH"
						content="0;url=principal.php">
					</head>
				</html>
				';
		}else{

	// Si el resultado es negativo, entonces nada		
			}
	}echo "Este usuario no se encuentra registrado en la base de datos";
	// Cerramos base de datos
	$conexion=NULL;
	
?>