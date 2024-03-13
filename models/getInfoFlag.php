<?php
session_start();
$idUsuario = $_SESSION["id"];
$idFlag = trim(addslashes($_POST["idFlag"]));

include_once "../db/db.php";

$sql = "SELECT id, flag, max_puntos, num_pistas, dificultad FROM flags WHERE id='$idFlag'";

$result = obtenerArraySQL($conexion, $sql);

$json = [];
if(isset($result[0])){
	$json["flag"] = $result[0];

	$sql = "SELECT pistas.num_pista, pistas.pista 
		FROM pistas, usuarios_flags 
		WHERE pistas.num_pista <= usuarios_flags.num_pistas 
		and pistas.id_flag = '$idFlag' 
		and usuarios_flags.id_flag = '$idFlag' 
		and usuarios_flags.id_usuario = '$idUsuario'";

	$json["pistas"] = obtenerArraySQL($conexion, $sql);

	$json["error"] = false;
}else{
	$json["error"] = true;
}
// $indexFlags = [];

// foreach($flags as $flag){
// 	if(!isset($indexFlags[$flag['dificultad']])) {
// 		$indexFlags[$flag['dificultad']] = [];
// 	}
	
// 	array_push($indexFlags[$flag['dificultad']], $flag);
// }

echo json_encode($json);
?>