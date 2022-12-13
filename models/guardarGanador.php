<?php
//Introducir el id de los ganadores en orden
$idPuestos = [];

include_once "../db/db.php";

$sql = "SELECT id_persona, puesto_1, puesto_2, puesto_3, puesto_4 from apuestas_clasificacion";

$apuestas = obtenerArraySQL($conexion, $sql);

foreach($apuestas as $apuesta){
	$puntuacion = 0;
	$arrPuestos = [$apuesta["puesto_1"], $apuesta["puesto_2"], $apuesta["puesto_3"], $apuesta["puesto_4"]];
	for($i=0; $i<4; $i++){
		if (in_array($idPuestos[$i], $arrPuestos)){
			$puntuacion++;
		}
		if($idPuestos[$i] == $arrPuestos[$i]){
			$puntuacion += 20-5*$i;
		}
	}
	$puntuacion = 0;

	$id_persona = $apuesta["id_persona"];
	$sql = "UPDATE apuestas_clasificacion SET puntuacion = $puntuacion where id_persona = $id_persona";
	$conexion->exec($sql);
	$sql = "UPDATE personas SET puntuacion = puntuacion + $puntuacion where id = $id_persona";
	$conexion->exec($sql);
}
?>