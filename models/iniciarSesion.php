<?php
session_start();
$email = trim(addslashes($_POST["email"]));
$password = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$sql = "SELECT id, nombre, email, puntuacion, user_token FROM personas WHERE email='$email' and password='$password'";

$usuario = obtenerArraySQL($conexion, $sql);

$json = [];
if(count($usuario) != 0){
	$json["error"] = false;
	$usuario = $usuario[0];
	
	$_SESSION["id"] = $usuario["id"];
	$_SESSION["nombre"] = $usuario["nombre"];
	$_SESSION["puntuacion"] = $usuario["puntuacion"];
	$_SESSION["email"] = $email;
	$_SESSION["token"] = $usuario["user_token"];
}else{
	$json["error"] = true;
}
echo json_encode($json);
?>