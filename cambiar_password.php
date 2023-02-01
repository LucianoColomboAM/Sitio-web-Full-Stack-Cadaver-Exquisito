
<!DOCTYPE html>
<html lang="en">
<head>

<?php
    include("php/header.php");
?>

</head>
<body>


<?php
    //Cambiando la contraseña:
    //Con este script, los usuarios podrán cambiar su contraseña, a este archivo lo llamaremos cambiar_contrasena.php
    
    
    session_start();
    include('php/acceso_db.php'); // incluímos los datos de conexión a la BD
    
    if(isset($_SESSION['usuario_nombre'])) { // comprobamos que la sesión esté iniciada
        
         include("php/encabezadoPostLogin.php");
        
        if(isset($_POST['enviar'])) { 
            if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
                ?>
                <div class="container">
                <div class="jumbotron">
                <p>Las password ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a></p>
                
                </div>
                
                </div>
                <?php
            }else { 
                $usuario_nombre = $_SESSION['usuario_nombre']; 
                $usuario_clave = $_POST["usuario_clave"];
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contraseña con md5 
                $sql = "UPDATE usuarios SET usuario_clave='".$usuario_clave."' WHERE usuario_nombre='".$usuario_nombre."'";
                $result = $conn->query($sql);
                
                
                if($result) {
                    
                    ?>
                        <div class="container">
                        <div class="jumbotron">
                        <p>Password Cambiado Correctamente</p>

                        </div>

                        </div>
                    <?php
                    
                    
                }else {
                    ?>
                    <div class="container">
                    <div class="jumbotron">
                    <p>Error: No se pudo cambiar el password. <a href='javascript:history.back();'>Reintentar</a></p>
                    
                    </div>
                    
                    </div>
                    <?php
                } 
            } 
        }else {
            
?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form action="<?=$_SERVER['PHP_SELF']?>" class="login100-form validate-form flex-sb flex-w" method="post">
            <span class="login100-form-title p-b-32">
            Cambio de Password
            </span>

            <span class="txt1 p-b-11">
            Nuevo Password
            </span>
            <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                <span class="btn-show-pass">
                <i class="fa fa-eye"></i>
                </span>
                <input class="input100" type="password" name="usuario_clave" >
                <span class="focus-input100"></span>
            </div>

            <span class="txt1 p-b-11">
            Confirmar
            </span>
            <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                <span class="btn-show-pass">
                <i class="fa fa-eye"></i>
                </span>
                <input class="input100" type="password" name="usuario_clave_conf" >
                <span class="focus-input100"></span>
            </div>

        <div class="flex-sb-m w-full p-b-48">
            <div>

            </div>
        </div>

        <div class="container-login100-form-btn">
            <button name="enviar" class="login100-form-btn">
            Cambiar
            </button>
    </div>

    </form>
    </div>
</div>
</div>


<div id="dropDownSelect1"></div>



<?php
    }
    }else {
        echo "Acceso denegado.";
    }
    
?>
</body>
</html>
