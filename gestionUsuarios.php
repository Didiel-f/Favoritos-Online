<?php
	
	session_start();
	$codigo = $_SESSION['permisos'];
	if ($codigo == 1) {
		
	echo 'Tu usuario es: '.$_SESSION['usuario'].'<br>
		  Y tu contraseña es: '.$_SESSION['contrasena'];


	//Crear conexion

	$conexion = new PDO('sqlite:'.'favoritos.db');

	//Establecer una consulta

	$consulta = $conexion->prepare("SELECT * FROM usuarios");

	//Ejecutar la consulta

	$consulta->execute(); 

	//Imprimir la consulta

	echo "<table border=1 width=100%>
	  <tr>
	  	<td>Usuario</td>
	  	<td>Contraseña</td>
	  	<td>Nombre</td>
	  	<td>Apellido</td>
	  	<td>Cédula</td>
	  	<td></td>
	  	<td></td>
	  </tr>";

	while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
		  	echo "<tr><td>".$fila['usuario']."</td><td>".$fila['contrasena']."</td><td>".$fila['nombre']."</td><td>".$fila['apellido']."</td><td>".$fila['edad']."</td><td><a href='eliminarUsuario.php?usuario=".$fila['usuario']."&contrasena=".$fila['contrasena']."&nombre=".$fila['nombre']."&apellido=".$fila['apellido']."&edad=".$fila['edad']."'>Eliminar</a></td><td><a href='formularioActualizarUsuario.php?usuario=".$fila['usuario']."&contrasena=".$fila['contrasena']."&nombre=".$fila['nombre']."&apellido=".$fila['apellido']."&edad=".$fila['edad']."'>Actualizar</td></tr>";
	}

	// Añadir un registro
	echo "
			<tr>
				<form action='crearUsuario.php' method='POST'>
				<td><input type='text' name='usuario'></td>
				<td><input type='text' name='contrasena'></td>
				<td><input type='text' name='nombre'></td>
				<td><input type='text' name='apellido'></td>
				<td><input type='text' name='edad'></td>
				<td><input type='submit'></td>
				<td></td>
			</tr>
	";

	echo "</table>";

	//Cerramos la conexion
	$conexion=NULL;
	}else {echo "Tu no eres administrador, debes ir al index";}
?>