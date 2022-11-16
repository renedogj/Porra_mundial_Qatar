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
	<title>Mundial de Qatar</title>
	<meta name=author content="Javier Renedo">

	<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>-->

	<link rel="stylesheet" type="text/css" href="../css/body.css"/>
	<!--<link rel="stylesheet" type="text/css" href="../css/indexInicio.css">-->
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../css/tusApuestas.css">
</head>
<body>
	<nav class="nav-menu" id="menu"></nav>
	<h1>Partidos Mundial Qatar 2022</h1>
	<div class="select">
		<select name="selectDisplay" id="selectDisplay">
			<option value="grupo">Partidos por grupo</option>
			<option value="fecha">Partidos por fecha</option>
		</select>
	</div>
	<div id="divPartidosPorGrupos" class="divContenedorTabla"></div>
	<div id="divPartidosPorFecha" class="divContenedorTabla">
		<div id="divTablaPartidosPorFecha"></div>
	</div>
	
	<script type="text/javascript" src="../views/menu.js"></script>
	<script type="text/javascript" src="tusApuestas.js"></script>
	<script type="text/javascript" src="../views/tusApuestas.js"></script>
	<!--<script type="text/javascript" src="validarFormularios.js"></script>-->
	<!--<script type="text/javascript" src="controllers/ajustarVistas.js"></script>-->
</body>
</html>