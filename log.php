<?php
	
	//Lo comento porque ya está esto al principio de "principal"    session_start();
	
	$utc = date('U');
	$anio = date('Y');
	$mes = date('m');
	$dia = date('d');
	$hora = date('H');
	$minuto = date('i');
	$segundo = date('s');

	$usuarioLog = $_SESSION['usuario'];
	$contrasenaLog = $_SESSION['contrasena'];

	@$ip = getenv(REMOTE_ADDR);
	$navegador = $_SERVER["HTTP_USER_AGENT"];

	// Conexion

	$conexion = new PDO('sqlite:'.'favoritos.db');

	// Consulta

	$consulta = $conexion->prepare("INSERT INTO logs (utc,anio,mes,dia,hora,minuto,segundo,ip,navegador,usuario,contrasena)
									VALUES ('$utc','$anio','$mes','$dia','$hora','$minuto','$segundo','$ip','$navegador','$usuarioLog','$contrasenaLog');");

	// Ejecutar consulta
	$consulta->execute();

	//Cerrar
	$conexion=NULL;


?>