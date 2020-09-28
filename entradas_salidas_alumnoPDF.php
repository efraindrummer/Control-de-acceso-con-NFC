<?php
include( 'pdfgeneral.php' );
include( 'conexion.php' );

$ID = $_GET['alumnosm'];
$sqlCarrera = "SELECT nombre_alum, apellido_alum, matricula_alum, in_alum, out_alum, id_salon FROM alumnos NATURAL JOIN inout_alumnos WHERE matricula_alum = '$ID'";

$resultadocarrera = $conexion->query( $sqlCarrera );

$pdf = new PDF();

$pdf->AddPage();

$pdf->AliasNbPages();
$pdf->SetFont( 'Arial', 'B', 16 );
$pdf->Cell(190, 12, 'ENTRADA Y SALIDA DE ALUMNOS', 0, 1, 'C' );
$pdf->Ln( 10 );
//encabezado de la tabla
$pdf->SetFillColor( 232, 232, 232 );
$pdf->SetFont( 'Arial', 'B', 8 );
$pdf->Cell( 30, 8, 'NOMBRE', 1, 0, 'C', 1 );
$pdf->Cell( 30, 8, 'APELLIDO', 1, 0, 'C', 1 );
$pdf->Cell( 30, 8, 'MATRICULA', 1, 0, 'C', 1 );
$pdf->Cell( 30, 8, 'ENTRADA', 1, 0, 'C', 1 );
$pdf->Cell( 30, 8, 'SALIDA', 1, 0, 'C', 1 );
$pdf->Cell( 30, 8, 'SALON', 1, 0, 'C', 1);
$pdf->Ln( 8 );
//cuerpo de la tabla
$pdf->SetFont( 'Arial', '', 8 );
while ( $registro = $resultadocarrera->fetch_array( MYSQLI_BOTH ) ) {

    $pdf->Cell( 30, 8, $registro['nombre_alum'], 1, 0, 'C' );
    $pdf->Cell( 30, 8, $registro['apellido_alum'], 1, 0, 'C' );
    $pdf->Cell( 30, 8, $registro['matricula_alum'], 1, 0, 'C' );
    $pdf->Cell( 30, 8, $registro['in_alum'], 1, 0, 'C' );
    $pdf->Cell( 30, 8, $registro['out_alum'], 1, 0, 'C' );
    $pdf->Cell( 30, 8, $registro['id_salon'], 1, 0, 'C' );
    $pdf->Ln( 8 );

}
$pdf->Output( 'entrada y salida del alumno.pdf', 'I' );
?>