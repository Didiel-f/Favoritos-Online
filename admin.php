<?php
	
	session_start();

	$codigo = $_SESSION['permisos'];
	if ($codigo == 1) {

	echo "Pulsa <a href='verLogs.php'>AQUÍ</a> para ver los logs <br>";
	echo "Pulsa <a href='gestionUsuarios.php'>AQUÍ</a> para gestionar los usuarios";
	}else{

	echo'
	
	<html>
		<head>
			<meta http-equiv="REFRESH"
			content="0;url=index.php">
		</head>
	</html>
	';

	}

?>