<?php
    require 'fpdf/fpdf.php';

    Class PDF extends FPDF
    {
        function header()
        {
            $this->image('Images/Medisoft.png',5,0,40);
            $this->SetFont('Arial','B',15);
            $this->Cell(40);
            $this->Cell(120,10,'MEDISOFT CONSULTORIOS',0,1,'C');
            $this->Cell(40);
            $this->Cell(120,10,'FORMATO DE RECETA',0,0,'C');            
            $this->Ln(20);
        }

        function Footer()
        {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
?>