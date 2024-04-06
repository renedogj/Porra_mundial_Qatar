<?php
session_start();
$idUsuario = $_SESSION["id"];
$idFlag = trim(addslashes($_POST["idFlag"]));
$flag = trim(addslashes($_POST["flag"]));

include_once "../db/db.php";

$sql = "SELECT id, num_pistas, dificultad FROM flags WHERE id='$idFlag' AND flag='$flag'";

$flags = obtenerArraySQL($conexion, $sql);

$json = [];
if(isset($flags[0])){
	$json["flagCorrecto"] = true;
	$json["flag"] = $flag;

	$dificultad = $flags[0]["dificultad"];
	$numPistasTotales =  $flags[0]["num_pistas"];

	$sql = "UPDATE usuarios_flags SET resuelto = 1, 
	
	puntuacion = ((3 * $dificultad) + ($numPistasTotales - num_pistas) * (2 + $dificultad))

	WHERE id_flag='$idFlag' AND id_usuario='$idUsuario'";
	$conexion->exec($sql);
}else{
	$json["flagCorrecto"] = false;
}

echo json_encode($json);
?>