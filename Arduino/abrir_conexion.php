<?php
	//parametors para la conexion a la base de datos
	$host = "localhost";
	$basededatos = "acceso";
	$usuariodb = "root";
	$clavedb = null;

	//tablas de la base de datos
	$alumnos = "alumnos";
	$salones = "salones";
	$inout_alumnos= "inout_alumnos";
	$inout_alumnos2= "inout_alumnos2";

	error_reporting(0);

	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

	if ($conexion->connect_errno) {
		echo "LA CONEXION EXPERIMENTA FALLOS";
		exit();
	}

?>