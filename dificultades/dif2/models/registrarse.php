<?php
session_start();
$email = trim(addslashes($_POST["email"]));
$nombre = trim(addslashes($_POST["nombre"]));
$pwd = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$json = [];
try {
	$sql = "INSERT INTO personas (email, nombre, password) VALUES ('$email','$nombre','$pwd')";
	
	$conexion->exec($sql);
	
	$id = $conexion->lastInsertId();

	$json["error"] = false;
	
	$_SESSION["id"] = $id;
	$_SESSION["nombre"] = $nombre;
	$_SESSION["puntuacion"] = 0;
	$_SESSION["email"] = $email;

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