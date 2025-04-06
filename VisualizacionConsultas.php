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

	$id = $_GET['Folio'];
	$sql = "SELECT * FROM receta WHERE Folio = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualizacion Consulta</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/GenerarConsulta.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
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
					<h1>Visualización Consulta</h1>
				</div>
				<div class="col-12 col-sm-12  col-md-2 col-lg-2 col-xl-2 columnaCabezera3">
					<div class="logo">
						<nav class="navegacion">
							<ul>
								<li><a href="#">Cerrar Sesión</a></li>
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
				</section>
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
	</div>
	
    <div class="container">
   		<form action="ModificarConsulta.php" class="formAgregar" method="POST">
    		<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="fol" class="control_label">Folio</label>
    	      			<input type="text"  readonly class="control-form" id="folio" name="Folio" value="<?php echo $row['Folio'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="idmedico" class="control_label">Id Medico</label>
    	      			<input type="text"  readonly class="control-form" id="IdMedico" name="Id_medico" value="<?php echo $row['Id_medico'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="nombre" class="control_label">Nombre Medico</label>
    	      			<input type="text"  readonly class="control-form" id="Nombremed" name="Nombre_medico" value="<?php echo $row['Nombre_medico'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="ced" class="control_label">Cedula</label>
    	      			<input type="text" readonly class="control-form" id="cedu" name="Cedula" value="<?php echo $row['Cedula'];?>" required >
    				</div>
        		</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="fech" class="control_label">Fecha Consulta</label>
    	      			<input type="date" readonly class="control-form" id="fechacons" name="Fecha_consulta" value="<?php echo $row['Fecha_consulta'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="paci" class="control_label">Nombre Paciente</label>
    	      			<input type="text" readonly class="control-form" id="pacient" name="Paciente" value="<?php echo $row['Paciente'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="eda" class="control_label">Edad</label>
    	      			<input type="text" readonly class="control-form" id="edad" name="Edad" value="<?php echo $row['Edad'];?>" required>
    				</div>
        		</div>
        		
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="estatu" class="control_label">Estatura</label>
    	      			<input type="text" readonly class="control-form" id="estatura" name="Estatura" value="<?php echo $row['Estatura'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="pes" class="control_label">Peso</label>
    	      			<input type="text" readonly class="control-form" id="peso" name="Peso" value="<?php echo $row['Peso'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="tem" class="control_label">Temperatura</label>
    	      			<input type="text" readonly class="control-form" id="temp" name="Temperatura" value="<?php echo $row['Temperatura'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="pres" class="control_label">Presión</label>
    	      			<input type="text" readonly class="control-form" id="preio" name="Presion" value="<?php echo $row['Presion'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="aler" class="control_label">Alergías</label>
    	      			<input type="text" readonly class="control-form" id="alergs" name="Alergias" value="<?php echo $row['Alergias'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-12 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="padec" class="control_label">Padecimiento</label>
   	    				<p></p>
    	      			<textarea name="Padecimiento" readonly rows="10" cols="50" required><?php echo $row['Padecimiento'];?></textarea>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-12 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="Meicac" class="control_label">Orden medica</label>
   	    				<p></p>
   	    				<textarea name="Medicacion" id="" readonly cols="50" rows="10"  required><?php echo $row['Medicacion'];?></textarea>
    				</div>
        		</div>
			</div>
			<div class="row">
				
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
						<a href="RevisionConsultas.php" id="btnCancelar" class="botones botonDefecto">Regresar</a>
					</div>
        		</div>
			</div>

		</form>
	</div>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-12 footer"> 
			<div class="footer">
  				<p>Footer</p>
			</div>
		</div>
	</div>
</div>


</body>
<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
</html>