<?php
include_once "../db/db.php";

$sql = "SELECT * from personas";
$personas = obtenerArraySQL($conexion, $sql);

$sql = "SELECT * from apuestas ";
$apuestas = obtenerArraySQL($conexion, $sql);

foreach($personas as $persona){
	$id_persona = $persona["id"];
	$puntuacion = 0;
	foreach($apuestas as $apuesta){
		if($apuesta["id_persona"] == $id_persona){
			$puntuacion += $apuesta["puntuacion"];
		}
	}

	$sql = "UPDATE personas set puntuacion = $puntuacion where id = $id_persona";
	$conexion->exec($sql);
}
?>