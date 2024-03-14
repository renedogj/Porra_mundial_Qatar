<?php
session_start();
$idUsuario = $_SESSION["id"];
$idFlag = trim(addslashes($_POST["idFlag"]));

include_once "../db/db.php";

$sql = "SELECT id, flag, max_puntos, num_pistas, dificultad, instrucciones, resuelto FROM flags WHERE id='$idFlag'";

$result = obtenerArraySQL($conexion, $sql);

$json = [];
if(isset($result[0])){
	$json["flag"] = $result[0];

	if($json["flag"]["resuelto"] != 1) {
		unset($json["flag"]["flag"]);
	}

	$sql = "SELECT pistas.num_pista, pistas.pista 
		FROM pistas, usuarios_flags 
		WHERE pistas.num_pista <= usuarios_flags.num_pistas 
		AND pistas.id_flag = '$idFlag' 
		AND usuarios_flags.id_flag = '$idFlag' 
		AND usuarios_flags.id_usuario = '$idUsuario'";

	$json["pistas"] = obtenerArraySQL($conexion, $sql);


	$json["error"] = false;
}else{
	$json["error"] = true;
}

echo json_encode($json);
?>