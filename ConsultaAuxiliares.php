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

	$where = "WHERE (Id_rol=3)";
		
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE (Id_empleado LIKE '%$valor') AND (Id_rol=3)";
		}
	}


	$sql = "SELECT * FROM usuarios $where";

	$resultado = $mysqli->query($sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta Auxiliares</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/MenuAdmin.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/jquery.dataTables.min.js"></script>	
	<script></script>
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
					<h1>Consulta Auxiliares</h1>
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
	
    	<div class="row">
    		<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-12 columnaInfo"> 
				<a href="AgregarAuxiliares.php" class="btn btn-info">Nuevo Auxiliar</a>
				<p></p>
       	 	</div>
		</div>

    	<div class="row">
    		<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-12 columnaInfo"> 
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>ID Empleado: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
       	 	</div>
		</div>
	

    	<div class="row">
    		<div class="col-12 col-sm-12  col-md-12 col-lg-12  col-xl-12 columnaInfo"> 
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>	
							<th>Apellido Materno</th>
							<th>Telefono</th>
							<th>Email</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['Id_empleado']; ?></td>
								<td><?php echo $row['Nombre']; ?></td>
								<td><?php echo $row['Apellido_paterno']; ?></td>
								<td><?php echo $row['Apellido_paterno']; ?></td>
								<td><?php echo $row['Telefono']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td><a href="ModificarAuxiliares.php?Id_empleado=<?php echo $row['Id_empleado']; ?>" id="Modifi">Modficar</a></td>
								<td><a href="#" data-href="EliminarAuxiliar.php?Id_empleado=<?php echo $row['Id_empleado']; ?>" data-toggle="modal" data-target="#confirm-delete" id="Elimin">Eliminar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
       	 	</div>
		</div>

				<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
	<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
</html>