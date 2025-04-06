<?php

	require 'conexion.php';
	
	session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: index.php');
        }
	}
	
	$idusuario = $_SESSION['id'];

    $sql = "SELECT Id_empleado, Nombre, Apellido_paterno, Apellido_materno FROM usuarios WHERE Id_empleado='$idusuario'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	
	$sql1 = "SELECT Id_medico, Cedula FROM medicos WHERE Id_medico='$idusuario'";
	$result1 = $mysqli->query($sql1);
    $row1 = $result1->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Generar Consulta</title>
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
					<h1>Generar Consulta</h1>
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
			<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaMenu"> 
				<section>
				  <nav>
				  	<a href="MenuMedico.php">Inicio</a>
				  </nav>
				</section>
			</div>
			<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaMenu"> 
				<section>
				  <nav>
				    <a href="GenerarConsulta.php">Realizar Consulta</a>
				  </nav>
				</section>
			</div>	
			<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaMenu"> 
				<section>
				  <nav>
				    <a href="RevisionConsultasPMedico.php">Gestionar Consultas</a>
				  </nav>
				</section>
			</div>		
		</div>
	</div>
	
    <div class="container">
   		<form action="GuardaConsulta.php" method="POST" class="formAgregar">
    		<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="fol" class="control_label">Folio</label>
    	      			<input type="text"  class="control-form" id="folio" name="Folio" placeholder="0">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="idmedico" class="control_label">Id Medico</label>
    	      			<input type="text"  readonly class="control-form" id="IdMedico" name="Id_medico" value="<?php echo $row['Id_empleado']; ?>">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="nombre" class="control_label">Nombre Medico</label>
    	      			<input type="text"  readonly class="control-form" id="Nombremed" name="Nombre_medico" value="<?php echo utf8_decode($row['Nombre'])," ",utf8_decode($row['Apellido_paterno'])," ",utf8_decode($row['Apellido_materno']); ?>">
    				</div>
        		</div>
			</div>
			<div class="row">
        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="ced" class="control_label">Cedula</label>
    	      			<input type="text" readonly class="control-form" id="cedula" name="Cedula" value="<?php echo $row1['Cedula'];?>">
    				</div>
        		</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="fech" class="control_label">Fecha Consulta</label>
    	      			<input type="date" class="control-form" id="fechacons" name="Fecha_consulta" placeholder="Fecha Consulta">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="paci" class="control_label">Nombre Paciente</label>
    	      			<input type="text" class="control-form" id="pacient" name="NombrePaciente" placeholder="Nombre Paciente">
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="eda" class="control_label">Edad</label>
    	      			<input type="text" class="control-form" id="edad" name="Edad" placeholder="0">
    				</div>
        		</div>
        		
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="estatu" class="control_label">Estatura</label>
    	      			<input type="text" class="control-form" id="estatura" name="Estatura" placeholder="0">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="pes" class="control_label">Peso</label>
    	      			<input type="text" class="control-form" id="peso" name="Peso" placeholder="0">
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="tem" class="control_label">Temperatura</label>
    	      			<input type="text" class="control-form" id="temp" name="Temperatura" placeholder="0.0">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="pres" class="control_label">Presión</label>
    	      			<input type="text" class="control-form" id="preio" name="Presion" placeholder="0">
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="aler" class="control_label">Alergías</label>
    	      			<input type="text" class="control-form" id="alergs" name="Alergias" placeholder="Alergias">
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-12 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="padec" class="control_label">Padecimiento</label>
   	    				<p></p>
    	      			<textarea name="Padecimiento" rows="10" cols="50">Escriba aqui</textarea>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-12 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="Meicac" class="control_label">Orden medica</label>
   	    				<p></p>
   	    				<textarea name="Medicacion" id="" cols="50" rows="10">Medicación</textarea>
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-6  col-xl-6 columnaInfo"> 
    				<div class="formGroup">
   	    				<input type="submit" id="btnGuardar" class="botones botonDefecto" value="Guardar">
    				</div>
        		</div>

    			<div class="col-12 col-sm-12  col-md-6 col-lg-6  col-xl-6 columnaInfo"> 
    				<div class="formGroup">
   	    				<input type="reset" id="btnCancelar" class="botones botonDefecto" value="Cancelar">
    				</div>
        		</div>
			</div>

		</form>
	</div>

</body>
<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
</html>