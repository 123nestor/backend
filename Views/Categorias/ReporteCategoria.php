<?php
require('Assets/pdf/fpdf.php');
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->setFont('Arial', '', 15);
        // Título
        $this->setTitle("Reporte de Productos");
        // Salto de línea
        $this->Ln();
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//CABECERA
$pdf->setFont('Arial', 'B', 18);
$pdf->image(base_url().'Assets/img/empresa.jpg', 150, 5, 35, 30, 'JPG');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Nombre:"), 0, 0, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(60, 5, utf8_decode($config['nombre']), 0, 1, 'L');
$pdf->Cell(20, 5, utf8_decode("Ruc:"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($config['ruc']), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono:"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($config['telefono']), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección:"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($config['direccion']), 0, 1, 'L');
$pdf->Ln();
//CUERPO
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(170, 8, utf8_decode("REPORTE DE CATEGORIAS"), 0, 1, 'C');
$pdf->Ln(2);
$pdf->setFont('Arial', '', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(30, 8, utf8_decode('Id'), 1, 0, 'L', 1);
$pdf->Cell(60, 8, 'Nombre', 1, 0, 'L', 1);
$pdf->Cell(60, 8, utf8_decode('Descripción'), 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Estado', 1, 1, 'L', 1);
foreach ($data as $cat){
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 7, utf8_decode($cat['id']), 1, 0, 'L');
    $pdf->Cell(60, 7, utf8_decode($cat['nombre']), 1, 0, 'L');
    $pdf->Cell(60, 7, utf8_decode($cat['descripcion']), 1, 0, 'L');
    if($cat['estado']=1){
        $estado='activo';
    }else
    {
        $estado='inactivo';
    }
    $pdf->Cell(30, 7, utf8_decode($estado), 1, 1, 'L');
}
$pdf->Ln(8);
$pdf->Output();
?>