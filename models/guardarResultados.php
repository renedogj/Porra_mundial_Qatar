<?php
session_start();
$idPartido = $_POST["idPartido"];
$faseGrupos = $_POST["faseGrupos"];
$resultado1 = $_POST["resultado1"];
$resultado2 = $_POST["resultado2"];

include_once "../db/db.php";

if ($resultado1 == $resultado2){ 
	$ganador_es = 0;
}elseif ($resultado1 > $resultado2){
	$ganador_es = 1;
}else{
	$ganador_es = 2;
}

$sql = "UPDATE partidos set resultado_1 = $resultado1, resultado_2 = $resultado2 where id = $idPartido";

$conexion->exec($sql);

$sql = "SELECT id,id_persona,apuesta_1,apuesta_2,puntuacion FROM apuestas WHERE id_partido = $idPartido";

$apuestas = obtenerArraySQL($conexion, $sql);

foreach($apuestas as $apuesta){
	$puntuacion = 0;
	if ($apuesta["apuesta_1"] == $apuesta["apuesta_2"]){ 
		$ganador_apuesta = 0;
	}elseif ($apuesta["apuesta_1"] > $apuesta["apuesta_2"]){
		$ganador_apuesta = 1;
	}else{
		$ganador_apuesta = 2;
	}

	if($resultado1 == $apuesta["apuesta_1"]){
		$puntuacion++;
	}
	if($resultado2 == $apuesta["apuesta_2"]){
		$puntuacion++;
	}
	if($ganador_apuesta == $ganador_es){
		$puntuacion++;
	}

	$puntuacion *= $faseGrupos;

	$id_apuesta = $apuesta["id"];
	$id_persona = $apuesta["id_persona"];
	$sql = "UPDATE apuestas SET puntuacion = $puntuacion where id_partido = $idPartido and id = $id_apuesta";
	$conexion->exec($sql);
	$sql = "UPDATE personas SET puntuacion = puntuacion + $puntuacion where id = $id_persona";
	$conexion->exec($sql);
}

echo json_encode($apuestas);
?>