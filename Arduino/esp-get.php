<?php

include( 'abrir_conexion.php' );

$salon = $_GET['salon'];

///convierte los decimales a hexadecimales

$mac1 = dechex( $_GET['mac1'] );
$mac2 = dechex( $_GET['mac2'] );
$mac3 = dechex( $_GET['mac3'] );
$mac4 = dechex( $_GET['mac4'] );
$mac5 = dechex( $_GET['mac5'] );
$mac6 = dechex( $_GET['mac6'] );
$mac7 = dechex( $_GET['mac7'] );

//si el hexadecimal es de un solo digito agrega un 0

if ( strlen( $mac1 ) == 1 ) {
    $mac1 = '0'.$mac1;
}
if ( strlen( $mac2 ) == 1 ) {
    $mac2 = '0'.$mac2;
}
if ( strlen( $mac3 ) == 1 ) {
    $mac3 = '0'.$mac3;
}
if ( strlen( $mac4 ) == 1 ) {
    $mac4 = '0'.$mac4;
}
if ( $mac5 != NULL )
 {
    if ( strlen( $mac5 ) == 1 ) {
        $mac5 = '0'.$mac5;
    }
    if ( strlen( $mac6 ) == 1 ) {
        $mac6 = '0'.$mac6;
    }
    if ( strlen( $mac7 ) == 1 ) {
        $mac7 = '0'.$mac7;
    }
}
//concatena todos los bytes del uid en uno solo

if ( $mac5 != 0 )
 {

    $MAC = $mac1.$mac2.$mac3.$mac4.$mac5.$mac6.$mac7;
} else {
    $MAC = $mac1.$mac2.$mac3.$mac4;
}

echo 'hola entraste al salon:'.$salon. 'y tu credncial  es:'.$MAC.'|'  ;

//busca la matricula correspondiente a el uid en la base de datos ( alumno )

$resultados = mysqli_query( $conexion, "SELECT matricula_alum FROM alumnos  WHERE uid_alumno='$MAC'" );

while ( $consulta = mysqli_fetch_array( $resultados ) ) {
    $matri = $consulta ['matricula_alum'];
    echo $matri;
}

$resultados = mysqli_query( $conexion, "SELECT matricula_pers FROM personal  WHERE uid_personal='$MAC'" );

while ( $consulta = mysqli_fetch_array( $resultados ) ) {
    $matri = $consulta ['matricula_pers'];
    echo $matri;
}

$i = false;
$idio = 0;
//si la maestra es de un alumno ( de 6 digitos )
if ( strlen( $matri ) == 6 ) {

    //revisa si la matricula se encuentra dentro de un salon
    $resultados = mysqli_query( $conexion, "SELECT out_alum, id_IOA FROM inout_alumnos  WHERE matricula_alum='$matri'" );
    while ( $consulta = mysqli_fetch_array( $resultados ) ) {
        $out = $consulta ['out_alum'];
        if ( $out == NULL ) {
            $i = true;
            $idio = $consulta ['id_IOA'];
        }

    }

    //si esta en un salon hace un update;
    if ( $i == true ) {
        $conexion->query( "  UPDATE `inout_alumnos` SET `out_alum` = current_timestamp() WHERE `inout_alumnos`.`id_IOA` = $idio;" );
    }

    //si no esta en un salon hace un insert
    else {
        $conexion->query( "INSERT INTO `inout_alumnos` (`matricula_alum`, `id_salon`) VALUES ('$matri', '$salon');" );

    }

}

/// caso contrario es de un trabajador

else {
    //revisa si la matricula se encuentra dentro de un salon
    $resultados = mysqli_query( $conexion, "SELECT out_pers, id_IOP FROM inout_personal  WHERE matricula_pers='$matri'" );
    while ( $consulta = mysqli_fetch_array( $resultados ) ) {
        $out = $consulta ['out_pers'];
        if ( $out == NULL ) {
            $i = true;
            $idio = $consulta ['id_IOP'];
        }

    }

    //si esta en un salon hace un update;
    if ( $i == true ) {
        $conexion->query( "UPDATE `inout_personal` SET `out_pers` = current_timestamp() WHERE `inout_personal`.`id_IOP` = $idio" );
    }

    //si no esta en un salon hace un insert
    else {
        $conexion->query( "INSERT INTO `inout_personal` (`matricula_pers`, `id_salon`) VALUES ('$matri', '$salon');" );

    }

}
?>

