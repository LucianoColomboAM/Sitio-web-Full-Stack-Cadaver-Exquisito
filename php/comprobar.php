
<!DOCTYPE html>
<html lang="en">
<head>

<?php
    include("header.php");
?>

</head>
<body>

<?php 
//Este es el archivo que comprueba los datos ingresados en el formulario de login, lo llamaremos comprobar.php

    session_start(); 
    
	include('acceso_db.php'); 

    echo $_POST['usuario_nombre'];
    echo $_POST['usuario_clave'];
    
	if(isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos 
        if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) { 
            echo "El usuario o la contrase–a no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
        }else { 
                // "limpiamos" los campos del formulario de posibles códigos maliciosos
                $usuario_nombre = $_POST['usuario_nombre'];
                $usuario_clave = $_POST['usuario_clave'];
            
            
            
                $usuario_clave = md5($usuario_clave);
                //$usuario_clave = base64_encode($usuario_clave);
            
                // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
                $sql = "SELECT usuario_id, usuario_nombre, usuario_clave FROM usuarios WHERE usuario_nombre='".$usuario_nombre."' AND usuario_clave='".$usuario_clave."'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0)
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                            {
                    
                                $_SESSION['usuario_id'] = $row['usuario_id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                                $_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                                header("Location: ../index.php");

                            }
                    }
                else {
                        ?>
                   
                         <p>El usuario o la contraseña ingresada no son correctas,</p> 

                         <br> 

                         <a href="../index.php">Reintentar</a>

                
                  
                        <?php
                            }
        }
    }else
    {
        header("Location: ../index.php");
    }
    
    
?>

</body>
</html>
