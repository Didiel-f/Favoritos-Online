

<?php
	
	session_start();
	/*
	$_SESSION['usuario'] = "Didiel";
	$_SESSION['contrasena'] = "Didiel";
	*/

	if (isset($_SESSION['usuario'])) {
		
	echo'
	
	<html>
		<head>
			<meta http-equiv="REFRESH"
			content="0;url=principal.php">
		</head>
	</html>
	';

	}
	else{


	echo'
	
	<html>
		<head>
			<meta http-equiv="REFRESH"
			content="0;url=formularioLogin.php">
		</head>
	</html>
	';}
?>