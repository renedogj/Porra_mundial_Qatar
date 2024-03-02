<?php
if(!isset($_COOKIE["id"])){
	setcookie("id", "", time() - 3600);
	setcookie("nombre", "", time() - 3600);
	setcookie("puntuacion", "", time() - 3600);
	setcookie("email", "", time() - 3600);

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

	<link rel="stylesheet" type="text/css" href="../css/body.css"/>
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../css/partidos.css">
</head>
<body>
	<nav class="nav-menu" id="menu"></nav>
	<h1>Partidos Mundial Qatar 2022</h1>
	<h3>¡La porra de cada partido se cierra al comienzo del mismo!</h3>
	<div class="select">
		<select name="selectDisplay" id="selectDisplay">
			<option value="fecha">Partidos por fecha</option>
			<option value="grupo">Partidos por grupo</option>
		</select>
	</div>
	<div id="divPartidosPorGrupos" class="divContenedorTabla"></div>
	<div id="divPartidosPorFecha" class="divContenedorTabla">
		<div id="divTablaPartidosPorFecha"></div>
	</div>
	
	<script type="text/javascript" src="../views/menu.js"></script>
	<script type="text/javascript" src="partidos.js"></script>
	<script type="text/javascript" src="../views/partidos.js"></script>
</body>
</html>