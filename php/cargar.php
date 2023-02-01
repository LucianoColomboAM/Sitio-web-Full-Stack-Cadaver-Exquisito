<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
</head>

<body>
  <header>
    <html>
          <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
          </html>

      <li>
     <a href="conexion.php">
      Elementos registrados <a/>
      </li>
            <li>
     <a href="index.php">
      Cargar elementos <a/>
      </li>
 

  </header>

<?php
 include('php/acceso_db.php');
$name= $_POST['usuario_nombre']; 
$texto=$_POST['usuario_texto'];


$dataTime = date("Y-m-d H:i:s");
$allowedExts = array("jpg", "jpeg", "gif", "png");
$cadena = explode(".", $_FILES["file"]["name"]);
$extension = end($cadena);
$ruta = "fotos/". $_FILES["file"]["name"];
if ((

($_FILES["file"]["type"] == "image/gif")

|| ($_FILES["file"]["type"] == "image/jpeg")

|| ($_FILES["file"]["type"] == "image/png"))

&& ($_FILES["file"]["size"] < 2000000)

&& in_array($extension, $allowedExts))
  {
  
  
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
  
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    if (file_exists("fotos/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " ya existe!!!. ";
      }
    else
      {
    
      move_uploaded_file($_FILES["file"]["tmp_name"], "fotos/" . $_FILES["file"]["name"]);
  
    
    echo "Guardado en: " . "fotos/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {

  echo "Invalid file";
  }

  $sql = "INSERT INTO registros(nombre, ruta, tiemp,texto) VALUES ('$name','$ruta','$dataTime','$texto')";
 /*$sql = "SELECT nombre FROM registros WHERE nombre='".$name."'";
            $result = $conexion->query($sql);
                
            if ($result->num_rows > 0)
            {
          echo "El nombre usuario elegido ya ha escrito anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }*/
   if ($conn->query($sql) === TRUE)
    {
        echo "Se ha insertado un nuevo registro";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    ?>


?>

</body>
</html>