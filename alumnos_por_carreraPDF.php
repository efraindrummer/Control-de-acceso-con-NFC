<?php
include( 'pdfgeneral.php' );
include( 'conexion.php' );

$ID = $_GET['alumnos'];

//$sqlCarrera = "SELECT a.matricula_alum, a.nombre_alum, a.apellido_alum, p.id_carrera, p.nom_carrera FROM alumnos AS a INNER JOIN carrera AS p ON a.id_carrera = p.id_carrera WHERE p.id_carrera = '$ID'";
$sqlCarrera = "SELECT matricula_alum, nombre_alum, apellido_alum, nom_carrera, id_carrera FROM alumnos NATURAL JOIN carrera WHERE id_carrera = '$ID'";

$resultadocarrera = $conexion->query( $sqlCarrera );

$pdf = new PDF();

$pdf->AddPage();

$pdf->AliasNbPages();
$pdf->SetFont( 'Arial', 'B', 16 );
$pdf->Cell( 230, 12, 'LISTAR ALUMNOS', 0, 1, 'C' );
$pdf->Ln( 10 );
//encabezado de la tabla
$pdf->SetFillColor( 232, 232, 232 );
$pdf->SetFont( 'Arial', 'B', 10 );
$pdf->Cell( 30, 9, 'MATRICULA', 1, 0, 'C', 1 );
$pdf->Cell( 40, 9, 'NOMBRE', 1, 0, 'C', 1 );
$pdf->Cell( 40, 9, 'APELLIDO', 1, 0, 'C', 1 );
$pdf->Cell( 70, 9, 'CARRERA', 1, 0, 'C', 1 );
$pdf->Cell( 10, 9, 'ID', 1, 0, 'C', 1 );
$pdf->Ln( 10 );
//cuerpo de la tabla
$pdf->SetFont( 'Arial', '', 9 );
while ( $registro = $resultadocarrera->fetch_array( MYSQLI_BOTH ) ) {

    $pdf->Cell( 30, 9, $registro['matricula_alum'], 1, 0, 'C' );
    $pdf->Cell( 40, 9, $registro['nombre_alum'], 1, 0, 'C' );
    $pdf->Cell( 40, 9, $registro['apellido_alum'], 1, 0, 'C' );
    $pdf->Cell( 70, 9, $registro['nom_carrera'], 1, 0, 'L' );
    $pdf->Cell( 10, 9, $registro['id_carrera'], 1, 0, 'C' );

    $pdf->Ln( 10 );

}
$pdf->Output( 'alumnos por carrera.pdf', 'I' );
?>