<?php
   include 'Plantilla.php';
   include 'conexion.php';

   $id = $_GET['Folio'];
   
   $sql = "SELECT * FROM receta WHERE Folio = '$id'";
   $resultado = $mysqli->query($sql);
   
   $row = $resultado->fetch_array(MYSQLI_ASSOC);
   
   $pdf = new PDF();

   $pdf->AddPage();
   $pdf->SetFont('Arial','B',15);

   $pdf->Cell(100, 10, 'Folio: '.$row['Folio'],0, 1, 'L',0);
   $pdf->Cell(100, 10, 'Medico: '.$row['Nombre_medico'],0, 1, 'L',0);
   $pdf->Cell(100, 10, 'Cedula Profesional: '.$row['Cedula'],0, 1, 'L',0);
   $pdf->Cell(100, 10, 'Fecha: '.$row['Fecha_consulta'],0, 1, 'L',0);
   $pdf->Cell(100, 10, 'Paciente: '.$row['Paciente'],0, 1, 'L',0);
   $pdf->Cell(50, 10, 'Edad: '.$row['Edad'],0, 0, 'L',0);
   $pdf->Cell(50, 10, 'Estatura: '.$row['Estatura'],0, 0, 'L',0);
   $pdf->Cell(50, 10, 'Peso: '.$row['Peso'],0, 0, 'L',0);
   $pdf->Cell(50, 10, 'Temp.: '.$row['Temperatura'],0, 0, 'L',0);
   $pdf->Cell(50, 10, 'T.A: '.$row['Presion'],0, 1, 'L',0);
   $pdf->Cell(100, 10, 'Alergias:',0, 1, 'L',0);
   $pdf->MultiCell(180, 10, $row['Alergias'], 1, 'L',0);
   $pdf->Cell(100, 10, 'Orden Medica: ',0, 1, 'L',0);
   $pdf->MultiCell(180, 10, $row['Medicacion'], 1, 'L',0);
   $pdf->AddPage();

   $pdf->Output();

?>
