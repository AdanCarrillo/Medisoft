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

	$idusuario = $_SESSION['id'];

    $sql = "SELECT Id_empleado, Nombre FROM usuarios WHERE Id_empleado='$idusuario'";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu Administrador</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/MenuAdmin.css">
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
					<h1><?php echo 'Bienvenido '.utf8_decode($row['Nombre']); ?></h1>
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
    	<div class="row">
    	<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-8 columnaInfo"> 
    		<div class="card">
      			<h5>¿Que es Medisoft?</h5>
           		<p>Es una aplicación web desarrollada para antender las necesidades de los consultorios medicos y farmacias,
           		 esta aplicación ofrece ayuda en tener un control sobre las consultas realizadas por medicos y las ventas que se realizan por los auxiliares farmaceuticos</p>
        	</div>
        </div>
        <div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-4 columnaInfo"> 
          	<div class="desc">
      			<img src="Imagenes/Medisoft.png" class="img_desc">    	
          	</div>
        </div>
		</div>
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