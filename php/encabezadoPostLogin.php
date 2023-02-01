
<nav class="navbar navbar-expand-sm  navbar-dark">

<a class="navbar-brand disabled" href="index.php">Hola <?=$_SESSION['usuario_nombre']?></a>

<ul class="navbar-nav">
<li class="nav-item-active">
<a class="nav-brand" href="index.php">
<img src="images/perfil.png" alt="Logo" style="width:40px;">
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="cambiar_password.php">Cambiar Clave</a>
</li>

<li class="nav-item">
<a class="nav-link" href="php/logout.php">Salir</a>
</li>
</ul>
</nav>
