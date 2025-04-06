<?php

	require 'conexion.php';

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
    }


	$id = $_GET['Id_empleado'];
	$sql = "SELECT * FROM usuarios WHERE Id_empleado = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Auxiliar</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/AgregarAuxiliares.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

	<script> type="text/javascript"
		$(document).ready(function(){
			$('.delete').click(function(){
				var parent = $(this).parent().attr('id');
				var service = $(this).parent().attr('data');
				var dataString = 'id='+service;
					
				$.ajax({
					type: "POST",
					url: "del_file.php",
					data: dataString,
					success: function(){
						location.reload();
					}
				});
			});
		});
	</script>
</head>
<body>
	<header>
		<div class="container text center">
			<div class="row">
				<div class="col-12 col-sm-12  col-md-2 col-lg-2 col-xl-2 columnaCabezera1">
					<div class="logo">
						<img class="img_logo" src="Imagenes/MedisoftSN.png">	
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-8 col-lg-8  col-xl-8 columnaCabezera2"> 
					<h1>Modificar Auxiliares</h1>
				</div>
				<div class="col-12 col-sm-12  col-md-2 col-lg-2 col-xl-2 columnaCabezera3">
					<div class="logo">
						<nav class="navegacion">
							<ul>
								<li><a href="CerrarSesion.php">Salir</a></li>
							</ul>
						</nav>
					</div>
				</div>	
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
				    <a href="MenuAdmin.php">Inicio</a>
				  </nav>
				</section>
			</div>
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
				    <a href="ConsultaMedicos.php">Medicos</a>
				  </nav>
				</section>
			</div>
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
				    <a href="ConsultaAuxiliares.php">Auxiliares</a>
				  </nav>
				</section>
			</div>
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
			        <a href="ConsultaMedicamentos.php">Medicamentos</a>
				  </nav>
				</sections>
			</div>	
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
		   	        <a href="RevisionConsultas.php">Consultas</a>
				  </nav>
				</section>
			</div>	
			<div class="col-12 col-sm-6  col-md-6 col-lg-4  col-xl-2 columnaMenu"> 
				<section>
				  <nav>
				    <a href="#">Ventas</a>
				  </nav>
				</section>
			</div>		
		</div>
	
	
   		<form action="ModificarAuxiliar.php" method="POST" class="formAgregar" enctype="multipart/form-data">
    		<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="Id_empleado" class="control_label">Id Empleado</label>
    	      			<input type="text" maxlength="5" readonly class="control-form" id="Id_empleado" name="Id_empleado" placeholder="Id empleado" value="<?php echo $row['Id_empleado'];?>" required>
    				</div>
        		</div>


        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="curp" class="control_label">CURP</label>
    	      			<input type="text" maxlength="16" class="control-form" id="CURP" name="CURP" placeholder="CURP" value="<?php echo $row['CURP'];?>" required>
    				</div>
				</div>
				
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
						<label for="sex" class="control_label">Sexo</label>
						<select class="control-form" id="sex" name="sexo">
							<option value="Masculino" <?php if($row['Sexo'] == 'Masculino') echo 'selected'; ?>>Masulino</option>
							<option value="Femenino" <?php if($row['Sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
						</select>
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="nombre" class="control_label">Nombre</label>
    	      			<input type="text" class="control-form" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $row['Nombre'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="apaterno" class="control_label">Apellido Paterno</label>
    	      			<input type="text" class="control-form" id="aPaterno" name="Apellido_paterno" placeholder="Apellido Paterno" value="<?php echo $row['Apellido_paterno'];?>" required>
    				</div>
        		</div>
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="amaterno" class="control_label">Apellido Materno</label>
    	      			<input type="text" class="control-form" id="aMaterno" name="Apellido_materno" placeholder="Apellido Materno" value="<?php echo $row['Apellido_materno'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="teelfono" class="control_label">Telefono</label>
    	      			<input type="text" maxlength="10" class="control-form" id="telfono" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono'];?>" required>
    				</div>
        		</div>

    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="fecha" class="control_label">Fecha Nacimiento</label>
    	      			<input type="date" class="control-form" id="fecha" name="Fecha_nacimiento" placeholder="YYYY/MM/DD" value="<?php echo $row['Fecha_nacimiento'];?>" required>
    				</div>
        		</div>
        		
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="direccion" class="control_label">Dirección</label>
    	      			<input type="text" class="control-form" id="direccion" name="Direccion" placeholder="Dirección" value="<?php echo $row['Direccion'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="email" class="control_label">E-Mail</label>
    	      			<input type="email" class="control-form" id="eMail" name="Email" placeholder="E-Mail" value="<?php echo $row['Email'];?>" required>
    				</div>
        		</div>

    			<div class="col-12 col-sm-12  col-md-6 col-lg-8  col-xl-8 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="Contrasena" class="control_label">Contraseña</label>
    	      			<input type="password" class="control-form" id="contrasena" name="Contrasenia" placeholder="Contraseña" value="<?php echo $row['Contrasenia'];?>" required>
    				</div>
				</div>
				
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="archivo" class="control_label">Archivo</label>
						<input type="file" class="control-form" id="archivo" name="archivo" accept="image/*">

						<?php
							$path = "files/".$id;
							if(file_exists($path))
							{
								$directorio = opendir($path);
								while($archivo = readdir($directorio))
								{
									if(!is_dir($archivo))
									{
										echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."'title='Ver Archivo Adjunto'><span class='glyphico glyphicon-picture'></span></a>";
										echo "$archivo <a href='#' class='delete' title='Ver Archivo Ajunto' >Eliminar</a></div>";
										echo "<img src='files/$id/$archivo' widht='300'/>";
									}
								}
							}
						?>	

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<input type="submit" id="btnGuardar" class="botones botonDefecto" value="Modificar">
    				</div>
        		</div>

    			<div class="col-12 col-sm-12  col-md-6 col-lg-8  col-xl-8 columnaInfo"> 
    				<div class="formGroup">
					<a href="ConsultaAuxiliares.php" id="btnCancelar" class="botones botonDefecto">Cancelar</a>
    				</div>
        		</div>
			</div>

		</form>
	

	<div class="row">
		<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-12 footer"> 
			<div class="footer">
  				<p>Footer</p>
			</div>
		</div>
	</div>
</div>


</body>

</html>