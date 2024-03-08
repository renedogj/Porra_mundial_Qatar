<?php
session_start();
if(isset($_SESSION["id"])){
	$id = $_SESSION["id"];
	include_once "../db/db.php";

	$sql = "SELECT id, nombre, puntuacion FROM usuarios where id=$id";

	$usuario = obtenerArraySQL($conexion, $sql)[0];

	$_SESSION["nombre"] = $usuario["nombre"];
	$_SESSION["puntuacion"] = $usuario["puntuacion"];
}else{
	session_unset();
	session_destroy();
	header("Location: ../");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TFM - CTF</title>
	<meta name=author content="Javier Renedo">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/body.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/soluciones.css">
</head>
<body>
	<nav>
		<ul class="nav-menu">
			<li class="nav-item">
				<a href="#" class="nav-link">Puntuación: <?php echo $_SESSION["puntuacion"]; ?></a>
			</li>

			<li class="nav-item">
				<a href="#" class="nav-link">Usuario: <?php echo $_SESSION["nombre"]; ?></a>
			</li>
		</ul>
	</nav>
	<div class="title-container">
		<h1 class="title">Title</h1>
	</div>
	<div class="container" id="contenedorDificultades">
	</div>

	<script src="soluciones.js"></script>
</body>
</html>