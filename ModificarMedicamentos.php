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


	$id = $_GET['Id_medicamento'];
	$sql = "SELECT * FROM medicamentos WHERE Id_medicamento = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Medicamentos</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/AgregarMedicamentos.css">
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
					url: "del_file1.php",
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
					<h1>Modificar Medicamentos</h1>
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
   		<form action="ModificarMedicamento.php" method="POST" class="formAgregar" enctype="multipart/form-data"> 
    		<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="folio" class="control_label">Folio</label>
    	      			<input type="text" class="control-form" readonly id="folio" name="Folio" value="<?php echo $row['Id_medicamento'];?>" required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="nomgen" class="control_label">Nombre Generico</label>
    	      			<input type="text" class="control-form" id="nombreGen" name="Nombre_generico" value="<?php echo $row['Nombre_generico'];?>"  required>
    				</div>
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="nomcom" class="control_label">Nombre Comercial</label>
    	      			<input type="text" class="control-form" id="nombreCom" name="Nombre_comercial" placeholder="Nombre Comercial" value="<?php echo $row['Nombre_comercial'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="contenido" class="control_label">Contenido</label>
    	      			<input type="text" class="control-form" id="conten" name="Contenido" placeholder="0" value="<?php echo $row['Contenido'];?>" required>
    				</div> 
        		</div>

        		<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="viaAd" class="control_label">Vía Administración</label>
						   <select class="control-form" id="Via_admin" name="Via_admin">
								<option value="Oral" <?php if($row['Via_admin'] == 'Oral') echo 'selected';?>>Oral</option>
								<option value="Sublingual" <?php if($row['Via_admin'] == 'Sublingual') echo 'selected';?> >Sublingual</option>
								<option value="Topica" <?php if($row['Via_admin'] == 'Topica') echo 'selected';?> >Topica</option>
								<option value="Transdermica" <?php if($row['Via_admin'] == 'Transdermica') echo 'selected';?> >Transdermica</option>
								<option value="Olfalmotologica" <?php if($row['Via_admin'] == 'Olfalmotologica') echo 'selected';?> >Olfalmotologica</option>
								<option value="Inhalatoria" <?php if($row['Via_admin'] == 'Inhalatoria') echo 'selected';?>>Inhalatoria</option>
								<option value="Rectal" <?php if($row['Via_admin'] == 'Rectal') echo 'selected';?> >Rectal</option>
								<option value="Vaginal" <?php if($row['Via_admin'] == 'Vaginal') echo 'selected';?> >Vaginal</option>
								<option value="Parental" <?php if($row['Via_admin'] == 'Parental') echo 'selected';?>>Parental</optionss>
							</select>
					</div>
        		</div>
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="recip" class="control_label">Recipiente</label>
    	      			<input type="text" class="control-form" id="recp" name="Recipiente" placeholder="Recipiente" value="<?php echo $row['Recipiente'];?>" required>
    				</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="lab" class="control_label">Laboratorio</label>
    	      			<input type="text" class="control-form" id="labo" name="Laboratorio" placeholder="Laboratorio" value="<?php echo $row['Laboratorio'];?>" required>
    				</div>
        		</div>

    			<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="cad" class="control_label">Caducidad</label>
    	      			<input type="date" class="control-form" id="cadu" name="Caducidad" placeholder="YYYY/MM/DD" value="<?php echo $row['Caducidad'];?>" required>
    				</div>
        		</div>
        		
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo"> 
    				<div class="formGroup">
   	    				<label for="lot" class="control_label">Lote</label>
    	      			<input type="text" class="control-form" id="lote" name="Lote" placeholder="Lote" value="<?php echo $row['Lote'];?>" required>
    				</div>
        		</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="stok" class="control_label">Stock</label>
						<input type="text" class="control-form" id="stoc" name="Stock" placeholder="Stock" value="<?php echo $row['Stock'];?>" required>
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="precioFab" class="control_label">Precio De Fabricante</label>
						<input type="text" class="control-form" id="precioFab" name="Precio_fabricante" placeholder="0.0" value="<?php echo $row['Precio_fabricante'];?>" required>
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="precioPub" class="control_label">Precio Maximo Al Publico</label>
						<input type="text" class="control-form" id="PrecioPub" name="Precio_publico" placeholder="0.0" value="<?php echo $row['Precio_publico'];?>" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="archivo" class="control_label">Archivo</label>
						<input type="file" class="control-form" id="archivo" name="archivo" accept="image/*">

						<?php
							$path = "medicamentos/".$id;
							if(file_exists($path))
							{
								$directorio = opendir($path);
								while($archivo = readdir($directorio))
								{
									if(!is_dir($archivo))
									{
										echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."'title='Ver Archivo Adjunto'><span class='glyphico glyphicon-picture'></span></a>";
										echo "$archivo <a href='#' class='delete' title='Ver Archivo Ajunto' >Eliminar</a></div>";
										echo "<img src='medicamentos/$id/$archivo' widht='300'/>";
									}
								}
							}
						?>	

					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
					<div class="formGroup">
						<input type="submit" id="btnGuardar" class="botones botonDefecto" value="Modificar">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo"> 
					<div class="formGroup">
						<a href="ConsultaMedicamentos.php" id="btnCancelar" class="botones botonDefecto">Cancelar</a>
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