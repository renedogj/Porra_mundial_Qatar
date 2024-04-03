<?php
session_start();
if(isset($_SESSION["id"])){
	header("Location: controllers/selecionarDificultad.php");
	die();
}else{
	session_unset();
	session_destroy();
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
	<!-- <script src="jQuery/jquery-3.7.1.min.js"></script> -->
	<!-- <script src="jQuery/jquery.validate.min.js"></script> -->

	<link rel="stylesheet" type="text/css" href="css/body.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<h2>Login</h2>
			<form action="#" id="formInicioSesion">
				<div class="divInput">
					<input type="text" id="inputNombre" placeholder="Email" />
				</div>
				<div class="divInput">
					<input type="password" id="inputPassword" placeholder="Password" />
				</div>
				<label id="label-inicioIncorrecto" class="label-fallo-inicio error"></label>
				<input class="btn" type="submit" value="Login" />
				<br>
				<a href="controllers/registrarse.php">No tengo cuenta</a>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="controllers/iniciarSesion.js"></script>
	<script type="text/javascript" src="controllers/validarFormularios.js"></script>
</body>
</html>