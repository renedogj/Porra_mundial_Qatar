<?php
session_start();
$idUsuario = $_SESSION["id"];
$idFlag = trim(addslashes($_POST["idFlag"]));

include_once "../db/db.php";

$sqlUpade = "UPDATE usuarios_flags,flags 
	SET usuarios_flags.num_pistas = usuarios_flags.num_pistas + 1 
	WHERE usuarios_flags.num_pistas < flags.num_pistas 
	AND flags.id = '$idFlag'
	AND usuarios_flags.id_flag = '$idFlag'
	AND usuarios_flags.id_usuario = '$idUsuario';";

$numFilasModificadas = $conexion->exec($sqlUpade);

$json = [];
if($numFilasModificadas == 1) {

	$sql = "SELECT pistas.num_pista, pistas.pista 
		FROM pistas, usuarios_flags 
		WHERE pistas.num_pista <= usuarios_flags.num_pistas 
		AND pistas.id_flag = '$idFlag' 
		AND usuarios_flags.id_flag = '$idFlag' 
		AND usuarios_flags.id_usuario = '$idUsuario'";

	$json["pistas"] = obtenerArraySQL($conexion, $sql);

	$json["nuevaPista"] = true;
}else{
	$json["nuevaPista"] = false;
}

echo json_encode($json);
?>