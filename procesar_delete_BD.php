<!DOCTYPE html>
<html lang="es">
<head>

<?php
    include("php/header.php");
    ?>

</head>
<body>

<?php
//Páginas restringidas:
//Como en toda web con sistema de usuarios, siempre habrán zonas restringidas 
//a las que sólo podrán acceder usuarios registrados, entonces para ello partimos del siguiente código:

    session_start(); 
    include('php/acceso_db.php'); // incluímos los datos de acceso a la BD
    // comprobamos que se haya iniciado la sesión, o sea que un usuaior autorizado haya iniciado sesion

    if($_SESSION['usuario_nombre']=='admin') {
         include("php/encabezadoPostLogin.php");
?> 


<?php

$name=$_POST['borrar'];


$sql = "DELETE FROM usuarios WHERE usuario_nombre='$name'";
    
?>

<div class="container">
<div class="jumbotron">
<h1>Eliminar usuario:</h1>
<p>Selecciona un Usuario:</p>
</div>


<?php
 // a traves del post tomamos el nombre a borrar y lo eliminamos de la base de datos y mostramos el mensaje segun el resultado de la query  
if($result = $conn->query($sql))
{
echo "El usuario " . $_POST['borrar'] . " ha sido eliminado de la base de datos con exito";

}
else
{
echo "El usuario no pudo ser eliminado";

}
?>
</div>

<?php
    }
	//Si no es así, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "Estás accediendo a una página restringida, para ver su contenido debes estar registrado.<br /> 
        <a href='acceso.php'>Ingresar</a> / <a href='registro.php'>Regitrarme</a>"; 
    }
    
    include("php/footer.php");
?>


</body>
</html>
