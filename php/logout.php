
<?php 
    session_start(); 
    include('acceso_db.php'); // inclu�mos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesi�n 
    if(isset($_SESSION['usuario_nombre'])) { 
        session_destroy(); 
        header("Location: ../index.php"); 
    }else { 
        echo "Operaci�n incorrecta."; 
    } 
?>
