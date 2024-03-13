<?php
include_once "../db/db.php";

$sql = "SELECT id, flag, max_puntos, num_pistas, dificultad FROM flags";

$flags = obtenerArraySQL($conexion, $sql);

$indexFlags = [];

foreach($flags as $flag){
	if(!isset($indexFlags[$flag['dificultad']])) {
		$indexFlags[$flag['dificultad']] = [];
	}
	
	array_push($indexFlags[$flag['dificultad']], $flag);
}

echo json_encode($indexFlags);
?>