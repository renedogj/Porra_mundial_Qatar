<?php
session_start();
$id = $_SESSION["id"];
$idPartido = $_POST["idPartido"];
$idApuesta = $_POST["idApuesta"];
$apuesta1 = $_POST["apuesta1"];
$apuesta2 = $_POST["apuesta2"];

include_once "../db/db.php";

if($idApuesta == null){
	$sql = "INSERT INTO apuestas (id_partido, id_persona, apuesta_1, apuesta_2) VALUES ('$idPartido','$id','$apuesta1','$apuesta2')";	
}else{
	$sql = "UPDATE apuestas set apuesta_1 = $apuesta1, apuesta_2 = $apuesta2 where id = $idApuesta";
}

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