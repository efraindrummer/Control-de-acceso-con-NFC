<?php
// Configuración necesaria para acceder a la data base.
$hostname = "localhost";
$usuariodb = "acceso_sistema";
$passworddb = "75009809";
$dbname = "acceso";
	
// Generando la conexión con el servidor
$conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
?>