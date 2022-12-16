<?php

	# Incluyendo librerias necesarias #
    require_once "Assets/pdf/fpdf.php";

    $pdf = new FPDF('P','mm',array(80,190));
 
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper($config['nombre'])),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: ".$config['ruc']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: ".$config['direccion']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$config['telefono']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: SuperMercadoCanasta@gmail.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Caja Nro: 1"),0,'C',false);
     foreach ($data as $com){
        $usu=$com['usuario'];
    }
    $pdf->MultiCell(0,5,utf8_decode("Vendedor: ".$usu),0,'C',false);

    
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: ".$com['idventa'])),0,'C',false);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y h:i:s A", strtotime($com['fecha']))),0,'C',false);

    $pdf->SetFont('Arial','',9);
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente: ".$cliente['nombre']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Documento: ".$cliente['ruc']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$cliente['telefono']),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(30,5,utf8_decode("Descripción."),0,0,'L');
    $pdf->Cell(10,5,utf8_decode("Cant."),0,0,'L');
    $pdf->Cell(15,5,utf8_decode("Precio"),0,0,'L');
    $pdf->Cell(20,5,utf8_decode("Subtotal"),0,0,'L');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    $total=0;
    foreach ($data as $compras) {
        $subtotal = $compras['cantidad'] * $compras['precio'];
        $total = $total + $subtotal;
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(30, 5, utf8_decode($compras['producto']), 0, 0, 'L');
        $pdf->Cell(10, 5, $compras['cantidad'], 0, 0, 'L');
        $pdf->Cell(15, 5, $compras['precio'], 0, 0, 'L');
        $pdf->Cell(20, 5, number_format($subtotal, 2, '.', ','), 0, 1, 'L');
    }
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    #totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL"),0,0,'C');
    $pdf->Cell(32,5, 'Bs .'.number_format($total, 2, '.', ','), 0, 0, 'C');
    //$pdf->Cell(90, 5, 'Total S/.'. number_format( $total, 2, '.', ','), 0, 1, 'R');
    $pdf->Ln(5);

    

    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra!!!"),'',0,'C');

    $pdf->Ln(9);


    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);

    ?>