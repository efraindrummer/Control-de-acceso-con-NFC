<?php
    include("../fpdf/fpdf.php");
    include("../conexion.php"); //incluyo la conexion a la base de datos
 
    $sql = "SELECT in_pers, out_pers, matricula_pers, id_salon FROM inout_personal"; //consulta sql
    //declaracion de la variable resultado, pasando por referencia la conexion y añade por referencia la consulta $sql
    $resultado = $conexion->query($sql); 
    
    //plantilla del documento
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(200,10, 'ENTRADA Y SALIDA DEL PERSONAL',0,1,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);

    while ($field_info = mysqli_fetch_field($resultado)) {
    $pdf->Cell(46,10,$field_info->name,1);
    }

    while($rows = mysqli_fetch_assoc($resultado)) {
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();

        foreach($rows as $column) {
            $pdf->Cell(46,10,$column,1);
        }
    }
    $pdf->Output('reporte de entrada y salida del personal.pdf','I');
?>