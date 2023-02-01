
<!DOCTYPE html>
<html lang="en">
<head>

<?php
    include("../header.php");
?>

</head>
<body>


<?php
    //Cambiando la contraseña:
    //Con este script, los usuarios podrán cambiar su contraseña, a este archivo lo llamaremos cambiar_contrasena.php
    
    
    session_start();
    include('acceso_db.php'); // incluímos los datos de conexión a la BD 
    if(isset($_SESSION['usuario_nombre'])) { // comprobamos que la sesión esté iniciada
        
         include("encabezadoPostLogin.php");
        
        if(isset($_POST['enviar'])) { 
            if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { 
                echo "Las password ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
            }else { 
                $usuario_nombre = $_SESSION['usuario_nombre']; 
                $usuario_clave = $_POST["usuario_clave"];
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contraseña con md5 
                $sql = "UPDATE usuarios SET usuario_clave='".$usuario_clave."' WHERE usuario_nombre='".$usuario_nombre."'";
                $result = $conn->query($sql);
                
                
                if($result) {
                    echo "Password cambiado correctamente.";
                }else { 
                    echo "Error: No se pudo cambiar el password. <a href='javascript:history.back();'>Reintentar</a>";
                } 
            } 
        }else {
            
?> 
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
            <label>Nuevo Password:</label><br />
            <input type="password" name="usuario_clave" maxlength="15" /><br /> 
            <label>Confirmar:</label><br /> 
            <input type="password" name="usuario_clave_conf" maxlength="15" /><br /> 
            <input type="submit" name="enviar" value="enviar" />
        </form> 
<?php 
        } 
    }else { 
        echo "Acceso denegado."; 
    } 
?>
</body>
</html>
