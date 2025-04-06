<?php 
	require 'conexion.php';

	//Datos empleado
	$idempleado =$_POST['Id_empleado'];

	$curp =$_POST['CURP'];
	$sexo = $_POST['sexo'];
	$nombre =$_POST['Nombre'];
	$aPaterno =$_POST['Apellido_paterno'];
	$aMaterno =$_POST['Apellido_materno'];
	$telefono =$_POST['Telefono'];
	$fechaNac =$_POST['Fecha_nacimiento'];
	$direccion =$_POST['Direccion'];
	$email =$_POST['Email'];
	$contrasena =$_POST['Contrasenia'];
	//Datos medico
	$Cedula =$_POST['Cedula'];
	$Especialidad =$_POST['Especialidad'];
	$Facultad =$_POST['Fac_egreso'];

	$sql = "INSERT INTO usuarios (Id_empleado, CURP, Sexo, Nombre, Apellido_paterno, Apellido_materno, Telefono, Fecha_nacimiento, Direccion, Email, Contrasenia, Id_rol) 
			VALUES ('$idempleado', '$curp', '$sexo', '$nombre', '$aPaterno', '$aMaterno', '$telefono', '$fechaNac', '$direccion', '$email', '$contrasena', '2')";

	$sql1 = "INSERT INTO medicos (Id_medico, Cedula, Especialidad, Fac_egreso) 
			VALUES ('$idempleado', '$Cedula', '$Especialidad', '$Facultad')";

	$resultado = $mysqli->query($sql);

	if($resultado == true )
	{
		$resultado2 = $mysqli->query($sql1);
	}
	

	$id_insert = $idempleado;
	
	if($_FILES["archivo"]["error"]>0)
	{
		echo "Error al cargar archivo";
	}
	else
	{
		$permitidos = array("image/jpg","image/png");
		$limite_kb = 700;

		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024)
		{
			$ruta = 'files/'.$id_insert.'/';
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
					<?php if($resultado2) { ?>
						<h3>REGISTRO Modificado</h3>
						<?php } else { ?>
						<h3>ERROR AL Modificar</h3>
					<?php } ?>
					
					<a href="ConsultaMedicos.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
