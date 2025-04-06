<?php 
	require 'conexion.php';

	$Folio = $_POST['Folio'];
	$idmedico =$_POST['Id_medico'];
	$nombreMedico =$_POST['Nombre_medico'];
	$cedula =$_POST['Cedula'];
	$fecha = $_POST['Fecha_consulta'];
	$nombrePaciente =$_POST['NombrePaciente'];
	$edad =$_POST['Edad'];
	$estatura =$_POST['Estatura'];
	$peso =$_POST['Peso'];
	$temperatura =$_POST['Temperatura'];
	$presion =$_POST['Presion'];
	$alergias =$_POST['Alergias'];
	$padecimiento =$_POST['Padecimiento'];
	$medicacion =$_POST['Medicacion'];

	$id = $Folio;

	$sql = "INSERT INTO receta (Folio ,Id_medico, Nombre_medico, Cedula, Fecha_consulta, Paciente, Edad, Estatura, Peso, Temperatura, Presion, Alergias, Padecimiento, Medicacion) 
			VALUES ('$Folio', '$idmedico', '$nombreMedico', '$cedula', '$fecha', '$nombrePaciente', '$edad', '$estatura', '$peso', '$temperatura', '$presion', '$alergias', '$padecimiento', '$medicacion')";

	$resultado = $mysqli->query($sql);

 ?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { 
							$sql1 = "SELECT * FROM receta WHERE Folio = '$id'";
							$resultado1 = $mysqli->query($sql1);
						   
							$row = $resultado1->fetch_array(MYSQLI_ASSOC);
						?>
						<h3>Consulta Guardada</h3>
						<p></p>
						<a href="GenerarPDF.php?Folio=<?php echo $row['Folio'];?>" id="btnGeneraC" Class="btn btn-primary">Generar Receta</a>
						<?php 
					} else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					<p></p>
					<a href="RevisionConsultasPMedico.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
