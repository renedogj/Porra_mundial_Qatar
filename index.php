<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TFM - CTF</title>
	<meta name=author content="Javier Renedo">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/body.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<h2>Login</h2>
			<form action="#" id="formInicioSesion">
				<div class="textbox">
					<input type="text" id="inputNombre" placeholder="Email" />
				</div>
				<div class="textbox">
					<input type="password" id="inputPassword" placeholder="Password" />
				</div>
				<input class="btn" type="submit" value="Login" />
			</form>
		</div>
	</div>


	<script type="text/javascript" src="controllers/iniciarSesion.js"></script>
</body>
</html>