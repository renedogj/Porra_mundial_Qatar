<?php
session_start();
$id = $_COOKIE["id"];
$idPartido = $_POST["idPartido"];
include_once "../db/db.php";

$blackList = ["user","version", "database", "VERSION", "Version", "DATABASE", "Database", "DataBase", "DUAl", "Dual", "dual", "DUal", "DUAl", "dUAL", "dUal", "dUAl", "duaL", "duAl", "duAL", "duAl", "User", "uSer", "USER", "useR", "or", "Or", "oR", "OR", "WHERE", "where", "Where", "=", "NULL", "Null", "null", "NUll", "NuLL", "nUll", "nuLL", "mULL", "NuLl", "NuLL"];
$auxIdPartido = strtolower($idPartido);

if(!checkBlackList($auxIdPartido, $blackList) || is_int($idPartido) == 1){
	$idPartido = "";
}

if(!checkBlackList($id, $blackList)){
	$id = "";
}

$sql = "SELECT 
	partidos.id,
	partidos.fecha,
	paises_1.nombre as nombre_1,
	paises_1.abreviatura as abreviatura_1,
	paises_2.nombre as nombre_2,
	paises_2.abreviatura as abreviatura_2,
	resultado_1,
	resultado_2,
	apuestas.id as idApuesta,
	apuesta_1,
	apuesta_2,
	faseGrupos,
	apuestas.ganador as ganador
	FROM partidos
	LEFT JOIN paises as paises_1
	ON partidos.id_pais_1 = paises_1.id
	LEFT JOIN paises as paises_2
	ON partidos.id_pais_2 = paises_2.id
	LEFT JOIN apuestas
	ON partidos.id = apuestas.id_partido and apuestas.id_persona=$id WHERE partidos.id = $idPartido";

$partido = obtenerArraySQL($conexion, $sql);

echo json_encode($partido);
?>