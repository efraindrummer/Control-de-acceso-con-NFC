<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{

    function Header(){
        $this->AddLink();
        $this->Image('img/unnamed.png',10,10,40,0,'','https://www.instagram.com/efraindrummer/');
        $this->SetFont('Arial','B',18);
        $this->Cell(80);
        $this->Cell(30,10,'Control De Acceso',0,1,'C');
        $this->SetFont('Arial','B',14);
        $this->Cell(80);
        $this->Cell(30,10, 'REPORTE GENERAL',0,1,'C');
        //$this->Ln(10); // salto de linea

    }

    function Footer(){

        $this->SetY(-18);
        $this->SetFont('Arial','I',12);
        $this->AddLink();
        $this->Cell(5,10,'SISTEMA DE CONTROL DE ACCESO',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().' de {nb}',0,0,'C');

    }
}
?>