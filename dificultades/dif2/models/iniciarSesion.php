<?php
$email = trim(addslashes($_POST["email"]));
$password = MD5(trim($_POST["password"]));

include_once "../db/db.php";

$sql = "SELECT id, nombre, email, puntuacion FROM personas WHERE email='$email' and password='$password'";

$usuario = obtenerArraySQL($conexion, $sql);

$json = [];
if(count($usuario) != 0){
	$json["error"] = false;
	$usuario = $usuario[0];
	

	setcookie("id", $usuario["id"], time() + 86400, "/mundial%20qatar/dificultades/dif2/");
	setcookie("nombre", $usuario["nombre"], time() + 86400, "/mundial%20qatar/dificultades/dif2/");
	setcookie("puntuacion", $usuario["puntuacion"], time() + 86400, "/mundial%20qatar/dificultades/dif2/");
	setcookie("email", $usuario["email"], time() + 86400, "/mundial%20qatar/dificultades/dif2/");

}else{
	$json["error"] = true;
}
echo json_encode($json);
?>