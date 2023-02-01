

<!DOCTYPE html>
<html lang="en">
<head>
<script src="p5.js"> </script>
<script src="sketch.js"> </script>
<?php
    
    
    include("php/header.php");
?>

</head>
<body>

<?php
    //Ahora pasaremos a crear nuestro formulario de acceso o Login, a este archivo lo llamaremos acceso.php
    //recordemos que podemos cerrar un script en el medio de un if o un for
    //para agregar info html.
    
    
    //importante para indicar que se iniciar· una session
    session_start();
    include('php/acceso_db.php');
    
    //Primero comprobamos que las variables de sesiÛn estÈn vacÌas
    if(empty($_SESSION['usuario_nombre']))
    {
        //Una vez que comprobamos que no se esta logueado desde antes, podemos generar el formulario de acceso
        //Formulario de acceso:
?>



	<div class="limiter">
	       <center>
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="php/comprobar.php" class="login100-form validate-form flex-sb flex-w" method="post">

					<span class="login100-form-title p-b-32"> 
						Login de cuenta
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="usuario_nombre" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="usuario_clave" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">


						<div>
							<a href="registrarse.php" class="txt3">
								Registrarse
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button name="enviar" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
		
		</div>
    </center>
	</div>
	

	<div id="dropDownSelect1"></div>

<?php
    //Si un usuario esta previamente logueado, lo saludo y le indico su información, si es un admin tendra opciones extra.
    }else {
        
        if($_SESSION['usuario_nombre']=='admin')
        {
            
            
            include("php/encabezadoPostLogin.php");
            
            ?>



            <div class="container">
            <div class="jumbotron">
            <h1>Eres el administrador del sistema</h1>
                <p>Por esto tienes algunas opciones extra</p>
            </div>

            <div class="d-flex p-3 bg-secondary text-white">
            <div class="p-2 bg-primary"><a href="delete_BD.php">Eliminar Usuario</a></div>
            <div class="p-2 bg-warning"><a href="ver_BD.php">Ver Info de Usuario</a></div>
            </div>

            </div>
        <?php
        }
        else{
        include("php/encabezadoPostLogin.php");
        ?>
        <br>    <br>
     <div class="container">
        <div class="jumbotron">
        <h1>Bienvenido a la obra interactiva - Cadaver Exquisito</h1>
        <p>Desliza tu creatividad para crear una obra   </p>
        </div>

        <div class="container">
    
        <center>
    
            
                         
             <a href="cargar.php" class="btn btn-dark">Modifica la obra</a>
            </br>    </br>    </br>

       
         </center>
            </div>


        </div>
        <?php
            }
    }

            
            //include("php/footer.php"); 
?>

    
</body>
</html>
