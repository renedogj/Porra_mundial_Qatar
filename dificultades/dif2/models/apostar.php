<?php
session_start();
$id = $_COOKIE["id"];
$idPartido = $_POST["idPartido"];
$idApuesta = $_POST["idApuesta"];
$apuesta1 = $_POST["apuesta1"];
$apuesta2 = $_POST["apuesta2"] . " where id = $idApuesta; INSERT into paises (nombre, grupo) VALUES ('nombres2', 'V') -- ";

include_once "../db/db.php";
//"'); INSERT into paises (nombre, grupo) VALUES ('nombres2', 'V') -- ";
//" where id = $idApuesta; INSERT into paises (nombre, grupo) VALUES ('nombres2', 'V') -- ";
if(isset($_POST["ganador"])){
	$ganador = $_POST["ganador"];
	if($idApuesta == null){
		$sql = "INSERT INTO apuestas (id_partido, id_persona, apuesta_1, apuesta_2, ganador) VALUES ('$idPartido','$id','$apuesta1','$apuesta2','$ganador');";	
	}else{
		$sql = "UPDATE apuestas set apuesta_1 = $apuesta1, apuesta_2 = $apuesta2, ganador = $ganador where id = $idApuesta";
	}
}else{
	if($idApuesta == null){
		$sql = "INSERT INTO apuestas (id_partido, id_persona, apuesta_1, apuesta_2) VALUES ('$idPartido','$id','$apuesta1','$apuesta2')";	
	}else{
		$sql = "UPDATE apuestas set apuesta_1 = $apuesta1, apuesta_2 = $apuesta2, ganador = null where id = $idApuesta";
	}
}
echo $sql;
$json = [];
try{
	$conexion->exec($sql);
	$json["error"] = false;
}catch(PDOException $e){
	$json["error"] = true;
	$json["e"] = $e;
}
echo json_encode($json);
?>