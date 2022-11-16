<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mundial de Qatar - Registrarse</title>
	<meta name=author content="Javier Renedo">

	<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/body.css"/>
	<!--<link rel="stylesheet" type="text/css" href="../css/indexInicio.css">-->
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<!--<link rel="stylesheet" type="text/css" href="../css/tablaPartidos.css">-->
</head>
<body>
	<nav class="nav-menu" id="menu"></nav>

	<?php
	include "../views/formRegistrarse.html";
	?>
	
	<script type="text/javascript" src="../views/menu.js"></script>
	<script type="text/javascript" src="registrarse.js"></script>
	<!--<script type="text/javascript" src="../views/partidos.js"></script>-->
	<script type="text/javascript" src="validarFormularios.js"></script>
	<!--<script type="text/javascript" src="controllers/ajustarVistas.js"></script>-->
</body>
</html>