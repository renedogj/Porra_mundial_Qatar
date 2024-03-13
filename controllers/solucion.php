<?php
session_start();
if(isset($_SESSION["id"]) && isset($_GET["idFlag"])){
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
	<link rel="stylesheet" type="text/css" href="../css/solucion.css">
	<script>
		var idFlag = '<?php echo $_GET["idFlag"]; ?>';
	</script>
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
		<h1 class="title" id="title"></h1>
	</div>
	<main>
		
		<section id="clues" class="sectionInstrucciones">
			<h2>Instruciones</h2>
			<p id="pInstruciones"></p>		
		</section>
		<section class="sectionComprobarFlag">
			<label class="labelComprobarFlag">Comprobar la respuesta:</label>
			<div class="divInput">
				<input type="text" id="inputFlag" name="inputFlag" placeholder="Flag">
			</div>
			<button id="buttonCheckFlag" class="buttonCheckFlag">Comprobar flag</button>
		</section>
		<section id="clues" class="sectionPistas">
			<h2>Pistas</h2>
			<ul id="listaPistas" class="listaPistas">
				<li>Pista 1</li>
				<li>Pista 2</li>
				<li>Pista 3</li>
			</ul>
			<button class="buttonNuevaPista">Nueva pista</button>
		</section>
	</main>

	<script src="solucion.js"></script>
</body>
</html>