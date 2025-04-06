<?php
	require 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: MenuAdmin.php');
               break;
            case 2:
                header('location: MenuMedico.php');
                break;
            case 3:
                header('location: MenuAuxiliar.php');
                break;
                
            default:
        }
    }

    if(isset($_POST['Email']) && isset($_POST['Contrasenia'])){
        $username = $_POST['Email'];
        $password = $_POST['Contrasenia'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE Email = :Email AND Contrasenia = :Contrasenia');
        $query->execute(['Email' => $username, 'Contrasenia' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[11];
            $name = $row[1];
            $id = $row[0];
            $_SESSION['rol'] = $rol;
            $_SESSION['id'] = $id;
            $_SESSION['Nombre'] = $name;
            
            switch($rol){
                case 1:
                    header('location: MenuAdmin.php');
                break;
    
                case 2:
                    header('location: MenuMedico.php');
                break;
                case 3:
                	header('location: MenuAuxiliar.php');
                break;
                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/Login.css">
</head>
<body>
	<div class="container">
		<form action="#" class="formAgregar"  method="POST">
			<div class="row">
				<div class="col-12 col-sm-12  col-md-12 col-lg-6  col-xl-6 columnaInfo"> 
					<div class="desc">
						<img src="Imagenes/Medisoft.png" class="img_desc">    	
					</div>
					
				</div>
				<div class="col-12 col-sm-12  col-md-12 col-lg-6  col-xl-6 columnaInfo">
					<div class="formGroup">
						<h1>Bienvenido</h1>
					</div>
					<div class="formGroup">
                        <label for="email" class="control_label">E-mail</label>
                        <p></p>
						<input type="email" class="control-form" id="email" name="Email" placeholder="Inserte su E-mail" required>
					</div>
					<div class="formGroup">
                        <label for="pass" class="control_label">Contraseña</label>
                        <p></p>
						<input type="password" class="control-form" id="password" name="Contrasenia" placeholder="Inserte su contraseña" required>
					</div>
					<div class="formGroup">
						<input type="submit" class="boton" id="boton"  name="enviado" value="Entrar" id="boton1">	
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</body>
	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</html>