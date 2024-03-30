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

	<link rel="stylesheet" type="text/css" href="../css/body.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<h2>Registrarse</h2>
			<form action="#" id="formRegistrarse">
				<div class="divInput">
					<input type="text" name="inputNombre" id="inputNombre" placeholder="Nombre usuario">
				</div>
				<label id="inputNombre-error" class="error" for="inputNombre"></label>

				<div class="divInput">
					<input type="password" name="inputPassword" id="inputPassword" placeholder="Contraseña"> 
				</div>
				<label id="inputPassword-error" class="error" for="inputPassword"></label>

				<div class="divInput">
					<input type="password" name="inputPassword2" id="inputPassword2" placeholder="Repite la contraseña">
				</div>
				<label id="inputPassword2-error" class="error" for="inputPassword2"></label>

				<input id="bttn-registrarse" class="btn" type="submit" name="registrarse" value="Registrarse" />
				<br>
				<p>¿Ya tienes una cuenta? <br><a href="../index.php">Accede</a></p>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="../controllers/registrarse.js"></script>
	<script type="text/javascript" src="../controllers/validarFormularios.js"></script>
</body>
</html>