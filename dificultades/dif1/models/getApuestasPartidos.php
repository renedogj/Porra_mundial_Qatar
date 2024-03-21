<?php
$id = $_COOKIE["id"];

include_once "../db/db.php";

$sql = "SELECT 
	partidos.id,
	DATE_FORMAT(partidos.fecha, '%d-%m-%Y %H:%i') as fecha,
	paises_1.nombre as nombre_1,
	paises_1.abreviatura as abreviatura_1,
	paises_1.grupo as grupo_1,
	paises_2.nombre as nombre_2,
	paises_2.abreviatura as abreviatura_2,
	paises_2.grupo as grupo_2,
	-- resultado_1,
	-- resultado_2,
	-- apuesta_1,
	-- apuesta_2,
	partidos.ganador,
	-- puntuacion,
	faseGrupos
	FROM partidos
	LEFT JOIN paises as paises_1
	ON partidos.id_pais_1 = paises_1.id
	LEFT JOIN paises as paises_2
	ON partidos.id_pais_2 = paises_2.id
	-- LEFT JOIN apuestas
	-- ON partidos.id = apuestas.id_partido and apuestas.id_persona=$id
	ORDER BY fecha";

$partidos = obtenerArraySQL($conexion, $sql);


foreach ($partidos as $i => $partido){
	$idPartido = $partido["id"];

	$sql = "SELECT 
		personas.id,
		personas.nombre,	
		apuesta_1,
		apuesta_2,
		apuestas.puntuacion
		FROM apuestas
		LEFT JOIN personas as personas
		ON apuestas.id_persona = personas.id
		WHERE apuestas.id_partido = $idPartido";

	$partidos[$i]["apuestas"] = obtenerArraySQL($conexion, $sql);
	// $json["id"] = $_COOKIE["id"];

	// echo json_encode($json);
	$file = fopen("../partidos/". $idPartido . ".txt", "w");
	fwrite($file, json_encode($partidos[$i]));
}

echo json_encode($partidos);
?>