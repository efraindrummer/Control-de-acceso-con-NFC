<?php
include( 'pdfgeneral.php' );
include( 'conexion.php' );

$ID = $_GET['personal'];
$sqlPersonal = "SELECT nombre_pers, apellido_pers, in_pers, out_pers, id_salon FROM personal NATURAL JOIN inout_personal WHERE matricula_pers = '$ID'";
                
$resultadoPersonal = $conexion->query( $sqlPersonal );

$pdf = new PDF();

$pdf->AddPage();

$pdf->AliasNbPages();
$pdf->SetFont( 'Arial', 'B', 16 );
$pdf->Cell(190, 12, 'ENTRADA Y SALIDA DEL PERSONAL', 0, 1, 'C' );
$pdf->Ln( 10 );
//encabezado de la tabla
$pdf->SetFillColor( 232, 232, 232 );
$pdf->SetFont( 'Arial', 'B', 8 );
$pdf->Cell( 38, 8, 'NOMBRE', 1, 0, 'C', 1 );
$pdf->Cell( 38, 8, 'APELLIDO', 1, 0, 'C', 1 );
$pdf->Cell( 38, 8, 'ENTRADA', 1, 0, 'C', 1 );
$pdf->Cell( 38, 8, 'SALIDA', 1, 0, 'C', 1 );
$pdf->Cell( 38, 8, 'SALON', 1, 0, 'C', 1);
$pdf->Ln( 8 );
//cuerpo de la tabla
$pdf->SetFont( 'Arial', '', 8 );
while ( $registro = $resultadoPersonal->fetch_array( MYSQLI_BOTH ) ) {

    $pdf->Cell( 38, 8, $registro['nombre_pers'], 1, 0, 'C' );
    $pdf->Cell( 38, 8, $registro['apellido_pers'], 1, 0, 'C' );
    $pdf->Cell( 38, 8, $registro['in_pers'], 1, 0, 'C' );
    $pdf->Cell( 38, 8, $registro['out_pers'], 1, 0, 'C' );
    $pdf->Cell( 38, 8, $registro['id_salon'], 1, 0, 'C' );
    $pdf->Ln( 8 );

}
$pdf->Output( 'entrada y salida del personal.pdf', 'I' );
?>