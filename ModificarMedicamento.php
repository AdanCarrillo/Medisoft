<?php 
	require 'conexion.php';

	$Folio = $_POST['Folio'];
	$NombreGenerico =$_POST['Nombre_generico'];
	$NombreComercial = $_POST['Nombre_comercial'];
	$Contenido =$_POST['Contenido'];
	$Via =$_POST['Via_admin'];
	$Recipiente =$_POST['Recipiente'];
	$Laboratorio =$_POST['Laboratorio'];
	$Caducidad =$_POST['Caducidad'];
	$Lote =$_POST['Lote'];
	$Stock =$_POST['Stock'];
	$precioFab =$_POST['Precio_fabricante'];
	$precioPub =$_POST['Precio_publico'];


	$sql = "UPDATE medicamentos SET  Nombre_generico='$NombreGenerico', Nombre_comercial='$NombreComercial', 
					Contenido='$Contenido', Via_admin='$Via', Recipiente='$Recipiente',Laboratorio='$Laboratorio', 
					Caducidad='$Caducidad', Lote='$Lote', Stock='$Stock',Precio_fabricante='$precioFab', 
					Precio_publico='$precioPub' WHERE Id_medicamento = '$Folio'";
			
	$resultado = $mysqli->query($sql);
	$id_insert = $Folio;
	
	if($_FILES["archivo"]["error"]>0)
	{
		echo "Error al cargar archivo";
	}
	else
	{
		$permitidos = array("image/jpg","image/png");
		$limite_kb = 800;

		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024)
		{
			$ruta = 'medicamentos/'.$id_insert.'/';
			$archivo = $ruta.$_FILES["archivo"]["name"];
			if(!file_exists($ruta))
			{
				mkdir($ruta);
			}

			if(!file_exists($archivo))
			{	
				$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], 
				$archivo);

				if($resultado)
				{
					echo "Archivo guardado";
				}
				else{
					echo "no se pudo guardar el aerchivo";
				}
			}
			else{
				echo "El archivo ya existe";
			}
		}
		else
		{
			echo "Archvivo no permitido excede el tamaño";
		}
	}

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
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="ConsultaMedicamentos.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
