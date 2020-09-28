<?php
//parametros para la conexion a la base de datos
$host = 'localhost';
//nombre del host
$basededatos = 'acceso';
//nombre de la base de datos
$usuariodb = 'acceso_sistema';
//nombre del usuario
$clavedb = '75009809';
//contraseña de base de datos

//tablas de la base de datos
$carrera = 'carrera';
$cargo = 'cargo';
$alumnos = 'alumnos';
$inout_alumnos = 'inout_alumnos';
$inout_personal = 'inour_personal';
$personal = 'personal';
$salones = 'salones';

error_reporting( 0 );

$conexion = new mysqli( $host, $usuariodb, $clavedb, $basededatos );

if ( $conexion->connect_errno ) {
    echo 'LA CONEXION EXPERIMENTA FALLOS';
    exit();
}
?>