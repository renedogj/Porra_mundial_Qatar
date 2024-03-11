<?php
if(!isset($_COOKIE["id"]) || !isset($_GET["idPartido"])){
	setcookie("id", "", time() - 3600);
	setcookie("nombre", "", time() - 3600);
	setcookie("puntuacion", "", time() - 3600);
	setcookie("email", "", time() - 3600);

	header("Location: ../");
	die();
}else{
	$idPartido = $_GET["idPartido"];
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
	<link rel="stylesheet" type="text/css" href="../css/apuesta.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
</head>
<body>
	<script type="text/javascript">
		var idPartido = <?php echo '"'.$idPartido.'"'; ?>;
	</script>
	<nav class="nav-menu" id="menu"></nav>
	<?php
	include "../views/apuesta.html";
	?>
	<script type="text/javascript" src="../views/menu.js"></script>
	<script type="text/javascript" src="apuesta.js"></script>
	<?php
	if($_COOKIE["id"] == 1 || $_COOKIE["id"] == 2){
		include "../views/irGuardarResultado.html";
	}
	?>
	<div id="divPorrasPartido"></div>
	<script type="text/javascript" src="../views/apuesta.js"></script>
</body>
</html>