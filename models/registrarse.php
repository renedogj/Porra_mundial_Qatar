<?php
session_start();
$nombre = trim(addslashes($_POST["nombre"]));
$pwd = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$json = [];
try {
	$sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre','$pwd')";
	
	$result = $conexion->exec($sql);

	if($result == 1){

	
	$id = $conexion->lastInsertId();

		$json["error"] = false;

		$_SESSION["id"] = $id;
		$_SESSION["nombre"] = $nombre;
		$_SESSION["puntuacion"] = 0;
	}


} catch(PDOException $e) {
	$json["error"] = true;
	$json["errorInfo"]["errorCode"] = $e->getCode();

	if($e->getCode() == 23000){
		$json["errorInfo"]["code"] = $e->errorInfo[1];
		if($e->errorInfo[1] == 1062){
			$key = str_replace("'","",explode(" ",$e->errorInfo[2])[5]);
			$json["errorInfo"]["key"] = $key;
		}
	}
}
echo json_encode($json);
?>