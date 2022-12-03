<?php
session_start();
$idPartido = $_POST["idPartido"];
$faseGrupos = $_POST["faseGrupos"];
$resultado1 = $_POST["resultado1"];
$resultado2 = $_POST["resultado2"];
//Si existe $_POST["ganador"] se recoge en ganador si no se le asigna null
if(isset($_POST["ganador"])){
	$ganador = $_POST["ganador"];
}else{
	$ganador = null;
}

include_once "../db/db.php";

//Si ganador es null
if($ganador == null || $faseGrupos == 1){
	if ($resultado1 == $resultado2){ 
		$ganador = 0;
	}elseif ($resultado1 > $resultado2){
		$ganador = 1;
	}else{
		$ganador = 2;
	}
}
//Uptualizamos los resultados y el ganador del partido
$sql = "UPDATE partidos set resultado_1 = $resultado1, resultado_2 = $resultado2, ganador = $ganador where id = $idPartido";
$conexion->exec($sql);

//Selcionamos la información de la tabla apuestas
$sql = "SELECT id,id_persona,apuesta_1,apuesta_2,ganador,puntuacion FROM apuestas WHERE id_partido = $idPartido";

$apuestas = obtenerArraySQL($conexion, $sql);
//Iteramos las distintas apuestas
foreach($apuestas as $apuesta){
	$puntuacion = 0;

	if($resultado1 == $apuesta["apuesta_1"]){
		$puntuacion++;
	}
	if($resultado2 == $apuesta["apuesta_2"]){
		$puntuacion++;
	}
	//Si el partido es de fase de grupos comprobamos si ha acertado el ganador
	if($faseGrupos == 1){
		//Obtenemos el ganador por el que ha apostado
		if ($apuesta["apuesta_1"] == $apuesta["apuesta_2"]){ 
			$ganador_apuesta = 0;
		}elseif ($apuesta["apuesta_1"] > $apuesta["apuesta_2"]){
			$ganador_apuesta = 1;
		}else{
			$ganador_apuesta = 2;
		}
		//Si ha acertado el ganador sumamos 1 a la puntuación
		if($ganador_apuesta == $ganador){
			$puntuacion++;
		}
	}else{ //Si el partido no es de fase de grupos
		//Si ha acertado el ganador sumamos 1 a la puntuación 
		if($apuesta["ganador"] == $ganador){
			$puntuacion++;
		}
	}

	//Multiplicacmos la puntuación por la fase de grupo en la que estamos
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