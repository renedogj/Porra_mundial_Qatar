<?php
session_start();
if(!isset($_SESSION["id"])){
	session_unset();
	session_destroy();
	header("Location: ../");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Eurocopa 2024</title>
	<meta name=author content="Javier Renedo">

	<link rel="icon" type="image/png" href="img/favicon-euro-2024.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/body.css"/>
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../css/partidos.css">
	<link rel="stylesheet" type="text/css" href="../css/clasificatoria.css">
</head>
<body>
	<nav class="nav-menu" id="menu"></nav>
	<h1>Porra clasificación Eurocopa 2024</h1>
	<h3 class="contdown">La votación se cierra en: <span id="countdown-timer"></span></h3>
	<div class="divContenedoraInputPuesto">
		<div class="divInput_1_2_puesto">
			<div class="divInputPuesto">
				<label for="puesto_1">Primer puesto</label>
				<select id="puesto_1" name="puesto_1" class="selectPaises">
					<option>--</option>
				</select>
			</div>
			<div class="divInputPuesto">
				<label for="puesto_2">Segundo puesto</label>
				<select id="puesto_2" name="puesto_2" class="selectPaises">
					<option>--</option>
				</select>
			</div>
		</div>
		<!-- <div class="divInput_3_4_puesto">
			<div class="divInputPuesto">
				<label for="puesto_3">Tercer puesto</label>
				<select id="puesto_3" name="puesto_3" class="selectPaises">
					<option>--</option>
				</select>
			</div>
			<div class="divInputPuesto">
				<label for="puesto_4">Cuarto puesto</label>
				<select id="puesto_4" name="puesto_4" class="selectPaises">
					<option>--</option>
				</select>
			</div>
		</div> -->
	</div>
	<button id="guardarPorraClasificacion" class="button">Guardar</button>

	<div class="divClasificatoriaApuestas" id="divClasificatoriaApuestas"></div>
	<script type="text/javascript" src="../views/menu.js"></script>
	<script type="text/javascript" src="clasificatoria.js"></script>
	<script type="text/javascript" src="../views/clasificatoria.js"></script>
</body>
</html>