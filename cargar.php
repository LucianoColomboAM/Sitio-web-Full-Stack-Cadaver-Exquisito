
<!DOCTYPE html>
<html lang="en">
<head>

<?php
    include("php/header.php");
?>

</head>
<body>


<?php
    
    
    session_start();
    include('php/acceso_db.php'); // incluímos los datos de conexión a la BD
    
    if(isset($_SESSION['usuario_nombre'])) { // comprobamos que la sesión esté iniciada
        
         include("php/encabezadoPostLogin.php");
        
        if(isset($_POST['enviar'])) {  // a traves del comando POST recibo las variables ingresadas por los usuarios
   
                $usuario_nombre = $_SESSION['usuario_nombre']; 
                $usuario_texto = $_POST["usuario_texto"];
                $usuario_ruta = $_POST["usuario_ruta"];
            // Luego de recibir las variables, usamos el UPDATE, SET Y WHERE para modificar la base de datos y hacemos la query
                $sql = "UPDATE usuarios 
                SET usuario_ruta='".$usuario_ruta."', usuario_texto='".$usuario_texto."'
                 WHERE usuario_nombre='".$usuario_nombre."'";
                $result = $conn->query($sql);
                
             //segun el resultado se mostraran los resultados   
                if($result) {
                    
                    ?>
                        <div class="container">
                        <div class="jumbotron">
                        <h1>Texto e imagen agregados satisfactoriamente </h1>
                        <a href="conexion.php">¡o clickea aquí para visualizar nuestra obra obra</a>



                        </div>

                        </div>
                    <?php
                    
                    
                }else {
                    ?>
                    <div class="container">
                    <div class="jumbotron">
                    <p>Error: No se pudo agregar el texto e imagen <a href='javascript:history.back();'>Reintentar</a></p>
                    
                    </div>
                    
                    </div>
                    <?php
                } 
             
        }else {
  //si no se a enviado el enviar se ejecuta la mayor parte del html, envio la informacion a traves de un form en el mismo archivo PHP, mediante el metodo POST.
  //Usamos los divisores limiter, container y jumbotron de los estilos bootstrap para crear los bloques de la pagina y toda lo que es la front page, 

?>
<div class="limiter">


        <div class="container">
             <div class="jumbotron">
             <br> <br> 
            
         <form action="<?=$_SERVER['PHP_SELF']?>" class="login100-form validate-form flex-sb flex-w" method="post">
        <center>
            <br>
            <p>Lejos de la ciudad, en un pueblo rodeado de lagos, hubo una persona capaz de sortear obstáculos inimaginables, de ser el sobrevivientes de incontables adversidades que nos llevaron a repetirlas por noches y noches de emociones y festejos. Si bien en las historias con el tiempo se deterioran, y se modifican los detalles, aquí entre todos vamos a contar una pequeña parte de esas acciones que hicieron de este pequeño pueblo el hogar y el comienzo de una de las mas memorables aventuras.</p>
            
            <p>Esta es nuestra obra juntos, escribe un parrafo hasta 1000 caracteres o suma imagenes para crear nuestra gran historia!</p>

             <br> <br>   
            <input type="file" name="usuario_ruta" id="usuario_ruta" enctype="multipart/form-data" value="" required /> 
    
             <br> <br>  
            
             <label for="comment">Texto:</label>
        
            <textarea class="form-control" rows="5" id="comment" name="usuario_texto" maxlength="1000" minlength="500 "required></textarea>
    
            
             <br> <br>
            <button name="enviar" class="login100-form-btn">
            Enviar
            </button>
            
           
            <br> 
                        
             <a href="conexion.php" class="btn btn-dark">Visualiza nuestra obra</a>
            </center>
            </form> 
        
</div>
</div>
</div>
</div>
</div>


<div id="dropDownSelect1"></div>



<?php
//si no estas logeado pero accedes a este php la pagina te expresa acceso denegado
    }
    }else {
        echo "Acceso denegado.";
    }
    

?>
</body>
</html>
