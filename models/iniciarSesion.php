<?php
session_start();
$nombre = trim(addslashes($_POST["nombre"]));
$password = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$sql = "SELECT id, nombre, puntuacion FROM usuarios WHERE nombre='$nombre' and password='$password'";

$usuario = obtenerArraySQL($conexion, $sql);

$json = [];
if(count($usuario) != 0){
	$json["error"] = false;
	$usuario = $usuario[0];
	
	$_SESSION["id"] = $usuario["id"];
	$_SESSION["nombre"] = $usuario["nombre"];
	$_SESSION["puntuacion"] = $usuario["puntuacion"];

	$json["session"] = $_SESSION;
}else{
	$json["error"] = true;
}
echo json_encode($json);
?>