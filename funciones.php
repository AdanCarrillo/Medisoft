<?php

    function isNullLogin ($usuario, $password)
    {
        if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function login($usuario, $password)
    {
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT Id_empleado, Contrasenia, Id_rol FROM usuarios
                WHERE Email = ?");

        $stmt->bind_param("ss", $usuario, $usuario);
        $stmt->execute(); 
        $stmt->store_result();
        $rows = $stmt->num_rows;

        if($rows > 0)
        {
            $stmt->bind_result($Id_empleado, $Contrasena, $Id_rol);
            $stmt->fetch();

            $validaPass = password_verify($password, $Contrasena);

            if($validaPass)
            {
                $_SESSION['Id_empleado'] = $Id_empleado;
                $_SESSION['Id_rol'] = $Id_rol;

                header("location: Welcome.php");
            }
            else
            {
                $errors ="La contrasenia es incorrecta";
            }
        }
        else
        {
            $errors ="El usuario no existe";
        }
        
    }

?>