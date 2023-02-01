<!DOCTYPE html>
<html lang="en">
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


<html>
<body>

<?php

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    //a traves de una query buscamos los usuarios y con un option mostramos la lista de usuarios
    // mandamos a traves de metodo post el usuario que queremos eliminar a procesar_delete_BD

?>
<div class="container">
<div class="jumbotron">
<h1>Eliminar usuario:</h1>
<p>Selecciona un Usuario:</p>
</div>

<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
<form action="procesar_delete_BD.php" class="login100-form validate-form flex-sb flex-w" method="post">
<select  name="borrar">
<option >Seleccione un Usuarios</option>
</div>
<?php

while ($row=$result->fetch_assoc())
{
echo "<option value=".$row['usuario_nombre'].">".$row['usuario_nombre']."</option>\n"; 
}


?>

</select>

<div class="container-login100-form-btn">
<button name="enviar" class="login100-form-btn">
Eliminar
</button>
</div>
</form>
</div>
</div>


<?php 
    }
	//Si no es así, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "Estás accediendo a una página restringida, donde solo el administrador puede acceder.<br /> 
        <a href='acceso.php'>Volver</a>"; 
    }
    
    
    include("php/footer.php");
?>


</body>
</html>
