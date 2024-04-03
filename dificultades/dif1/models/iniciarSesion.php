<?php
$email = trim(addslashes($_POST["email"]));
$password = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$blackList = ['"',"'", "select", "from", "where", "order", "having", "group", "insert", "delete", "update", "drop", "-"];

$auxEmail = strtolower($email);
$auxPassword = strtolower($password);

$json = [];
if(checkBlackList($auxEmail, $blackList) && checkBlackList($auxPassword, $blackList)) {
	$sql = "SELECT id, nombre, email, puntuacion FROM personas WHERE email='$email' and password='$password'";

	$usuario = obtenerArraySQL($conexion, $sql);

	if(count($usuario) != 0){
		$json["error"] = false;
		$usuario = $usuario[0];

		setcookie("id", $usuario["id"], time() + 86400, "/dificultades/dif1/");
		setcookie("nombre", $usuario["nombre"], time() + 86400, "/dificultades/dif1/");
		setcookie("puntuacion", $usuario["puntuacion"], time() + 86400, "/dificultades/dif1/");
		setcookie("email", $usuario["email"], time() + 86400, "/dificultades/dif1/");
	}else{
		$json["error"] = true;
	}	
}else{
	$json["error"] = true;
}


echo json_encode($json);
?>