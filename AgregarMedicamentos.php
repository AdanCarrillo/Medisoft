<?php
	session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
	}
	?>
<!DOCTYPE html>
<html>

<head>
	<title>Agregar Medicamentos</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/AgregarMedicamentos.css">
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
					<h1>Agregar Medicamentos</h1>
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
						<a href="MenuAdmin.html">Inicio</a>
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
		<form action="GuardaMedicamento.php" method="POST" enctype="multipart/form-data" class="formAgregar">
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="folio" class="control_label">Folio</label>
						<input type="text" class="control-form" id="Folio" name="Folio" placeholder="0">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="nomgen" class="control_label">Nombre Generico</label>
						<input type="text" class="control-form" id="nombreGen" name="Nombre_generico"
							placeholder="Nombre Generico">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="nomcom" class="control_label">Nombre Comercial</label>
						<input type="text" class="control-form" id="nombreCom" name="Nombre_comercial"
							placeholder="Nombre Comercial">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="contenido" class="control_label">Contenido</label>
						<input type="text" class="control-form" id="conten" name="Contenido" placeholder="0">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="viaAd" class="control_label">Vía Administración</label>
						<select class="control-form" id="Via_admin" name="Via_admin">
							<option value="Oral">Oral</option>
							<option value="Sublingual">Sublingual</option>
							<option value="Topica">Topica</option>
							<option value="Transdermica">Transdermica</option>
							<option value="Olfalmotologica">Olfalmotologica</option>
							<option value="Inhalatoria">Inhalatoria</option>
							<option value="Rectal">Rectal</option>
							<option value="Vaginal">Vaginal</option>
							<option value="Parental">Parental</option>
						</select>
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="recip" class="control_label">Recipiente</label>
						<input type="text" class="control-form" id="recp" name="Recipiente" placeholder="Recipiente">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="lab" class="control_label">Laboratorio</label>
						<input type="text" class="control-form" id="labo" name="Laboratorio" placeholder="Laboratorio">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="cad" class="control_label">Caducidad</label>
						<input type="date" class="control-form" id="cadu" name="Caducidad" placeholder="YYYY/MM/DD">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-12 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="lot" class="control_label">Lote</label>
						<input type="text" class="control-form" id="lote" name="Lote" placeholder="Lote">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="stok" class="control_label">Stock</label>
						<input type="text" class="control-form" id="stoc" name="Stock" placeholder="Stock">
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="precioFab" class="control_label">Precio De Fabricante</label>
						<input type="text" class="control-form" id="precioFab" name="Precio_fabricante" placeholder="0.0">
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<label for="precioPub" class="control_label">Precio Maximo Al Publico</label>
						<input type="text" class="control-form" id="PrecioPub" name="Precio_publico" placeholder="0.0">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12  col-md-6 col-lg-12  col-xl-12 columnaInfo">
					<div class="formGroup">
						<label for="archivo" class="control_label">Archivo</label>
						<input type="file" class="control-form" id="archivo" name="archivo" accept="image/*">
					</div>
				</div>
				<div class="col-12 col-sm-12  col-md-6 col-lg-4  col-xl-4 columnaInfo">
					<div class="formGroup">
						<input type="submit" id="btnGuardar" class="botones botonDefecto" value="Guardar">
					</div>
				</div>

				<div class="col-12 col-sm-12  col-md-6 col-lg-8  col-xl-8 columnaInfo">
					<div class="formGroup">
						<input type="reset" id="btnCancelar" class="botones botonDefecto" value="Cancelar">
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
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>