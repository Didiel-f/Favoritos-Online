<?php session_start(); 
	$codigo = $_SESSION['permisos'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="estilo/estilo2.css">
	</head>
	<body>
		<div id="contenedor">
			<header>
				<section id="logotipo">
					<div id="logo">
						<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
						 width="200" height="160" viewBox="0 0 480.000000 480.000000"
						 preserveAspectRatio="xMidYMid meet">
						<metadata>
						Created by potrace 1.14, written by Peter Selinger 2001-2017
						</metadata>
						<g transform="translate(0.000000,480.000000) scale(0.100000,-0.100000)"
						fill="#000000" stroke="none">
						<path d="M2173 4661 c-17 -10 -44 -26 -60 -37 -15 -10 -53 -30 -83 -44 -107
						-50 -156 -87 -204 -158 -25 -37 -52 -87 -61 -112 -24 -68 -31 -242 -12 -315 8
						-33 18 -84 22 -114 7 -51 6 -54 -13 -49 -12 3 -29 0 -39 -7 -26 -19 -21 -106
						12 -211 27 -88 45 -114 75 -114 13 0 23 -15 35 -52 23 -70 59 -140 93 -180 31
						-36 81 -184 102 -301 7 -37 21 -78 31 -91 21 -26 16 -36 -17 -36 -13 0 -39
						-14 -58 -31 -38 -32 -55 -78 -90 -239 -50 -224 -79 -320 -190 -629 -45 -126
						-86 -352 -111 -616 -9 -93 -23 -224 -31 -290 -8 -67 -14 -153 -14 -192 0 -40
						-4 -74 -9 -77 -14 -9 -23 417 -11 554 6 69 15 188 20 264 15 213 54 398 141
						671 66 206 95 277 136 334 52 74 81 124 89 156 l7 30 -33 -30 c-18 -16 -50
						-56 -71 -87 -44 -65 -64 -82 -247 -214 -236 -170 -263 -235 -312 -759 -5 -55
						-14 -311 -20 -570 -11 -469 -11 -471 -45 -660 -19 -104 -44 -242 -55 -307 -11
						-64 -23 -123 -26 -132 -5 -14 17 -16 215 -16 l222 0 -2 105 c-1 58 0 108 3
						110 2 2 28 -45 58 -105 49 -99 57 -110 81 -110 23 0 37 18 125 163 l99 162 6
						440 c9 636 32 1053 70 1273 17 104 92 503 104 559 3 12 28 46 55 77 l51 55
						-27 43 c-16 24 -36 52 -46 64 -18 20 -17 22 69 107 100 98 193 174 261 214 58
						34 209 160 217 182 3 9 9 45 12 81 3 43 13 77 28 101 36 56 86 225 83 278 -3
						40 -6 46 -27 49 -22 3 -23 7 -17 45 32 213 29 357 -10 410 -13 18 -33 50 -44
						72 -35 69 -95 145 -114 145 -7 0 -36 23 -65 50 -35 33 -58 47 -64 41 -6 -6
						-17 -5 -32 5 -39 25 -134 45 -157 33 -16 -9 -24 -7 -42 10 -26 25 -23 25 -63
						2z"/>
						<path d="M2674 3123 c-36 -37 -128 -159 -205 -271 -196 -281 -322 -536 -390
						-787 -22 -78 -17 -282 8 -380 47 -180 99 -278 262 -495 10 -14 83 -142 161
						-285 159 -288 182 -330 296 -525 l79 -135 3 -122 4 -123 363 0 363 0 82 253
						c45 138 88 272 96 297 24 78 88 380 109 520 4 25 9 54 12 65 3 11 7 93 10 181
						5 152 4 168 -22 270 -17 71 -28 146 -31 219 -3 60 -12 160 -20 220 -9 61 -19
						184 -24 275 -9 186 -14 213 -65 359 -80 231 -139 312 -242 337 -62 16 -337 33
						-518 34 l-111 0 -40 43 c-22 23 -48 54 -57 69 -9 15 -27 32 -38 39 -19 10 -28
						4 -85 -58z"/>
						</g>
					</svg>
					</div>
					<div id="tipo">
						<h1>MisFavoritos</h1>
					</div>
				</section>
				<section id="login">
					Hola, <?php echo $_SESSION['usuario']  ?>
					<div id="unlog">
						<br><a href='unLog.php'>PULSA AQUÍ PARA CERRAR TU SESIÓN</a><br>
						<?php
							if ($codigo == 1) {
								echo "<a href='admin.php'>PULSA AQUÍ PARA IR A ADMIN</a>";
							}
						?>
					</div>
				</section>
			</header>
			<section id="contenido">
					
				<section id="etiquetas">

					<?php
	
						include("log.php");	
						

						if (isset($_SESSION['usuario'])) {
							  
						

						//Crear conexion

						$conexion = new PDO('sqlite:'.'favoritos.db');

						//Establecer una consulta

						$consulta = $conexion->prepare("SELECT * FROM favoritos WHERE usuario='".$_SESSION['usuario'] ."' AND contrasena='".$_SESSION['contrasena'] ."'");

						//Ejecutar la consulta

						$consulta->execute(); 

						//Imprimir la consulta

						while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
							echo "
									<table border='1'>
										<tr>
											<th>".$fila['titulo']."<span id='estrellas'>Valoracion: ".$fila['valoracion']."</span>
										</tr>
										<tr>
											<td>
												Enlace: ".$fila['direccion']."
											</td>
										</tr>
										<tr>
											<td>
												Categoría: ".$fila['categoria']."
											</td>
										</tr>
										<tr>
											<td>
												Comentario: ".$fila['comentario']."
											</td>
										</tr>
										<tr>
										<td>
											<a href='eliminarFavorito.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>Eliminar</a>
										</td>
										</tr>
										<tr>
											<td>
												<a href='formularioActualizar.php?titulo=".$fila['titulo']."&direccion=".$fila['direccion']."&categoria=".$fila['categoria']."&comentario=".$fila['comentario']."&valoracion=".$fila['valoracion']."'>Actualizar</a>
											</td>
										</tr>
									</table>

							";
						}

						// Añadir un registro
						echo "
								<table id='crearFav' border='1' ><form action='crearFavorito.php' method='POST'>
									<tr>
										<th>
										Insertar nuevo favorito
										</th>
									</tr>
									<tr>
										<th><input type='text' name='titulo' value='Introduce el titulo'><span id='estrellas'>Valoracion: <input type='text' name='valoracion' value='Introduce una valoración'></span>
									</tr>
									<tr>
										<td>Introduce tu valoracion
										<input type='range' name='valoracion' value='0' min='0' max='10' style='width:95%'>
										<table>
											<tr>
												<td>
													0
												</td>
												<td align=right>
													10
												</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
									<tr>
										<td>
											<input type='text' name='direccion' value='Introduce el enlace'>
										</td>
									</tr>
									<tr>
										<td>
											<select name='categoria'>
												<option value='Salud'>Salud</option>
												<option value='Trabajo'>Trabajo</option>
												<option value='Hobby'>Hobby</option>
												<option value='Personal'>Personal</option>
												<option value='Otros'>Otros</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Comentario: <input type='text' name='comentario' value='Introduce un comentario'>
										</td>
									</tr>
									<tr>
										<td>
											<input type='submit'>
										</td>
									</tr>


								</form></table>

							";

						echo "</table>";

						//Cerramos la conexion
						$conexion=NULL;

						//////////////////// SOCIALIZO ///////////////////////////////////////////////////
						
						function muestraCategoria($dameCategoria){

						//echo "Algunos links que quizas te pueden interezar de la Categoría ".$dameCategoria."";

						$conexion = NEW PDO('sqlite:'.'favoritos.db');

						$consulta = $conexion->prepare("SELECT * FROM favoritos WHERE usuario!='".$_SESSION['usuario'] ."' AND categoria='".$dameCategoria."' ORDER BY RANDOM() LIMIT 3");
						$consulta->execute();

						while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
					  		echo "<table id='propFav' border='1'>
									<tr>
										<th>".$fila['titulo']."<span id='estrellas'>Valoracion: ".$fila['valoracion']."</span>
									</tr>
									<tr>
										<td>
											Enlace: ".$fila['direccion']."
										</td>
									</tr>
									<tr>
										<td>
											Categoría: ".$fila['categoria']."
										</td>
									</tr>
									<tr>
										<td>
											Comentario: ".$fila['comentario']."
										</td>
									</tr>
								 </table>
						  	";
						}
						$conexion=NULL;
						}

						muestraCategoria("Salud");
						muestraCategoria("Trabajo");
						muestraCategoria("Hobby");
						muestraCategoria("Personal");
						muestraCategoria("Otros");

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
					
				</section>
				<section id="trampa"> -	 </section>

			</section>
			<footer>
				(c) 2017 - Didiel Figueroa
			</footer>
		</div>
	</body>
</html>

<!--CODIGO ANTIGUO-->