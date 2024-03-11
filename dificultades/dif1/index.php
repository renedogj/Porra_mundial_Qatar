<?php
if(isset($_COOKIE["id"])){
	$id = $_COOKIE["id"];
	include_once "db/db.php";

	$sql = "SELECT nombre,puntuacion,email from personas where id=$id";

	$persona = obtenerArraySQL($conexion, $sql)[0];

	$_COOKIE["nombre"] = $persona["nombre"];
	$_COOKIE["puntuacion"] = $persona["puntuacion"];
	$_COOKIE["email"] = $persona["email"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mundial de Qatar</title>
	<meta name=author content="Javier Renedo">

	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
	<script src="../../jQuery/jquery-3.7.1.min.js"></script>
	<script src="../../jQuery/jquery.validate.min.js"></script>


	<link rel="stylesheet" type="text/css" href="css/body.css"/>
	<link rel="stylesheet" type="text/css" href="css/indexInicio.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<div class="div-inicio">
		<div class="div-barraSuperior">
			<nav class="nav-menu" id="menu"></nav>
		</div>
		<div class="div-inicio-titulo">
			<h1 class="h1-inicio-titulo">Mundial de Qatar 2022</h1>
			<br>
			<p>Proyecto desarrollado por Javier Renedo González y Carlos Renedo González</p>
		</div>
		<div class="div-inicioSesion">	
			<?php
			if(!isset($_COOKIE["id"])){
				include "views/fromInicioSesion.html";
			}else{
				include "views/sesionIniciada.php";
			}
			?>
		</div>
	</div>
	<script type="text/javascript" src="views/menu.js"></script>
	<script type="text/javascript" src="controllers/inicio.js"></script>
	<script type="text/javascript" src="controllers/validarFormularios.js"></script>
</body>
</html>