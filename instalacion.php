	<?php
	
						                      //CREAR UNA TABLA DE FAVORITOS_______________________________________________________________________________

//Conexion--------------------------------------------------------------------

	$conexion = new PDO('sqlite:'.'favoritos.db');

//Crear una tabla------------------------------------------------------------

	$tabla='favoritos';

	$crear = 'CREATE TABLE IF NOT EXISTS '.$tabla.'
			 (
			 usuario      CHAR(40)NOT NULL,
			 contrasena   CHAR(40)NOT NULL,
			 titulo       CHAR(40)NOT NULL,
			 direccion   CHAR(100)NOT NULL,
			 categoria    CHAR(40)NOT NULL,
			 comentario  CHAR(200)NOT NULL,
			 valoracion         INTEGER);';
			 
//Insertar contenido en la tabla---------------------------------------------

	if($conexion->query($crear)){
    print "La tabla SQLite ".$tabla." ha sido CREADA<br>";
   } else{
        print "Ha ocurrido un error de PDO: <br>" ;
        echo "<pre>";
            print_r($conexion->errorInfo());
        echo "</pre>";
};

//Cerrar conexion------------------------------------------------------------

	$conexion = NULL;


						                      //CREAR CONTENIDO DE PRUEBA PARA FAVORITOS______________________________________________________________________

//Conexion--------------------------------------------------------------------

	$conexion = new PDO('sqlite:'.'favoritos.db');

//Ingresar valores a una tabla-----------------------------------------------

	$tabla='favoritos';
	$agregar="INSERT INTO $tabla (usuario,contrasena,titulo,direccion,categoria,comentario,valoracion)
			  VALUES ('Didiel','Didiel','Google','http://www.google.com','Tecnologia','Este es un buscador muy famoso',10),
					 ('Didiel','Didiel','Didiel WEB','http://www.didiel.com','Tecnologia','Esta es mi pagina',10);";
	
//Insertar contenido en la tabla---------------------------------------------

	$conexion->query($agregar);

//Cerrar conexion------------------------------------------------------------
	$conexion=NULL;
	


						                      //CREAR UNA TABLA DE USUARIOS_________________________________________________________________________________

//Conexion--------------------------------------------------------------------
$conexion = new PDO('sqlite:'.'favoritos.db');
//Crear una tabla------------------------------------------------------------
	$tabla = 'usuarios';
	$crear = 'CREATE TABLE IF NOT EXISTS '.$tabla.'
			 (
			 usuario       CHAR(40)NOT NULL,
			 contrasena   CHAR(40) NOT NULL,
			 nombre        CHAR(40)NOT NULL,
			 apellido     CHAR(100)NOT NULL,
			 edad                   INTEGER,
			 permisos            INTEGER);';			 
//Insertar contenido en la tabla---------------------------------------------
	if($conexion->query($crear)){
    print "La tabla SQLite ".$tabla." ha sido CREADA<br>";
   } else{
        print "Ha ocurrido un error de PDO: <br>" ;
        echo "<pre>";
            print_r($conexion->errorInfo());
        echo "</pre>";
};
//Cerrar conexion------------------------------------------------------------
$conexion=NULL;

							                      //CREAR CONTENIDO DE PRUEBA PARA USUARIOS______________________________________________________________________
//Conexion--------------------------------------------------------------------
	$conexion = new PDO('sqlite:'.'favoritos.db');
//Ingresar valores a una tabla-----------------------------------------------
	$tabla='usuarios';
	$agregar="INSERT INTO $tabla (usuario,contrasena,nombre,apellido,edad,permisos)
			  VALUES ('Didiel','Didiel','Didiel Alejandro','Figueroa',22,1);";
//Insertar contenido en la tabla---------------------------------------------
	$conexion->query($agregar);
//Cerrar conexion------------------------------------------------------------
	$conexion=NULL;
						                      //CREAR UNA TABLA DE LOGS_________________________________________________________________________________

//Conexion--------------------------------------------------------------------
$conexion = new PDO('sqlite:'.'favoritos.db');
//Crear una tabla------------------------------------------------------------
	$tabla = 'logs';
	$crear = 'CREATE TABLE IF NOT EXISTS '.$tabla.'
			 (
			 utc             INTEGER,
			 anio            INTEGER,
			 mes             INTEGER,
			 dia             INTEGER,
			 hora            INTEGER,
			 minuto          INTEGER,
			 segundo         INTEGER,
			 ip        	    Char(50),
			 navegador  	Char(40),
			 usuario    	Char(40),
			 contrasena  Char(40));';			 
//Insertar contenido en la tabla---------------------------------------------
	if($conexion->query($crear)){
    print "La tabla SQLite ".$tabla." ha sido CREADA<br>";
   } else{
        print "Ha ocurrido un error de PDO: <br>" ;
        echo "<pre>";
            print_r($conexion->errorInfo());
        echo "</pre>";
};
//Cerrar conexion------------------------------------------------------------
	$conexion=NULL;

							                      //CREAR CONTENIDO DE PRUEBA PARA LOGS______________________________________________________________________
//Conexion--------------------------------------------------------------------
	$conexion = new PDO('sqlite:'.'favoritos.db');
//Ingresar valores a una tabla-----------------------------------------------
	$tabla='logs';
	$agregar="INSERT INTO $tabla (utc,anio,mes, dia,hora,minuto,segundo,ip,navegador,usuario,contrasena)
			  VALUES ('000000000',2011,02,07,21,03,01,'127.0.0.1','Chrome','Didiel','Didiel');";
//Insertar contenido en la tabla---------------------------------------------
	$conexion->query($agregar);
//Cerrar conexion------------------------------------------------------------
	$conexion=NULL;
	
?>