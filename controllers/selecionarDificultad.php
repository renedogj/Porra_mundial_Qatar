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

	<link rel="stylesheet" type="text/css" href="../css/selecionarDificultad.css">
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

			<li class="nav-item">
				<a href="#" class="nav-link">Soluciones</a>
			</li>
		</ul>
	</nav>
	<div class="title-container">
		<h1 class="title">Title</h1>
	</div>
	<div class="container">
		<div class="options">
			<div class="option">
				<h3>Dificultad 1</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button onclick="abrirDificultad(1)">Seleccionar</button>
			</div>
			<div class="option">
				<h3>Dificultad 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button onclick="abrirDificultad(2)">Seleccionar</button>
			</div>
			<div class="option">
				<h3>Dificultad 3</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button onclick="abrirDificultad(3)">Seleccionar</button>
			</div>
		</div>
	</div>

	<script src="selecionarDificultad.js"></script>
</body>
</html>