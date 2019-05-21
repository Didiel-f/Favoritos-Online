<?php
	session_start();
	// Recupero variables
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];


	$titulo = $_GET['titulo'];
	$direccion = $_GET['direccion'];
	$categoria = $_GET['categoria'];
	$comentario = $_GET['comentario'];
	$valoracion = $_GET['valoracion'];

	$conexion = new PDO('sqlite:'.'favoritos.db');

	$consulta = $conexion->prepare("SELECT * FROM favoritos 
									WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND titulo= '".$titulo."' AND direccion= '".$direccion."' AND categoria= '".$categoria."' AND comentario= '".$comentario."' AND valoracion= '".$valoracion."'");

	$consulta->execute();

	echo "<table border=1 width=100%>
	  <tr>
	  	<td>Titulo</td>
	  	<td>Dirección</td>
	  	<td>Categoría</td>
	  	<td>Comentario</td>
	  	<td>Valoración</td>
	  </tr>";

	  while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
	  		echo "
			<tr>
				<form action='actualizarFavorito.php' method='POST'>
					<td><input type='text' name='titulo' value='".$fila['titulo']."'></td>
					<td><input type='text' name='direccion' value='".$fila['direccion']."'></td>
					<td><select name='categoria'>
						<option value='Salud'>Salud</option>
						<option value='Trabajo'>Trabajo</option>
						<option value='Hobby'>Hobby</option>
						<option value='Personal'>Personal</option>
						<option value='Otros'>Otros</option>
					</td>
					<td><input type='text' name='comentario' value='".$fila['comentario']."'></td>
					<td><input type='text' name='valoracion' value='".$fila['valoracion']."'></td>
					<td><input type='submit'></td>
				</form>
			</tr>
			";
	}
	echo "</table>";
	$_SESSION['titulo'] = $titulo;
	$conexion=NULL;
?>