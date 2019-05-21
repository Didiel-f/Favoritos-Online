<?php
	session_start();

	$contador = 0;

	// Obtendré las variables del usuario
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$edad = $_POST['edad'];

	// Comprobar si el usuario existe conectandome a la base de datos

	$conexion = new PDO('sqlite:'.'favoritos.db');
	$consulta = $conexion->prepare("SELECT * FROM usuarios");
	$consulta->execute();
	while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
		if ($fila['usuario'] == $usuario) {
			$contador++;
		}else{}
	}
	$conexion=NULL;

	if ($contador == 0) {
		
	
	// Conexion
	$conexion = new PDO('sqlite:'.'favoritos.db');

	// Consulta
	/* Los privilegios son:
	1=Administrador
	2=Controlador
	3=Usuario registrado
	4=Usuario invitado
	*/
	$consulta = $conexion->prepare("INSERT INTO usuarios VALUES('$usuario','$contrasena','$nombre','$apellido','$edad',3) ");

	// Ejecutar
	$consulta->execute();

	// Se ingresa con el nuevo usuario
	$_SESSION['usuario'] = $usuario;
	$_SESSION['contrasena'] = $contrasena;


	// Cerrar
	$conexion=NULL;

	echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0;url=gestionUsuarios.php">
				</head>

			</html>
	';
}else{echo "El nombre de usuario que has elegido ya existe. Elige otro";}


?>