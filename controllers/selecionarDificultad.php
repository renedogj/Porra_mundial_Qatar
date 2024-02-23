<?php
$score = 100;
$username = "username";
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
				<a href="#" class="nav-link">Puntuación: <?php echo $score; ?></a>
			</li>

			<li class="nav-item">
				<a href="#" class="nav-link">Usuario: <?php echo $username; ?></a>
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
				<h3>Opción 1</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button>Seleccionar</button>
			</div>
			<div class="option">
				<h3>Opción 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button>Seleccionar</button>
			</div>
			<div class="option">
				<h3>Opción 3</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<button>Seleccionar</button>
			</div>
		</div>
	</div>

	<!-- <script src="selecionarDificultad.js"></script> -->
</body>
</html>