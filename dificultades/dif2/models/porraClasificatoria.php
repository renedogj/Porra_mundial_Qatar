<?php
session_start();
$id = $_COOKIE["id"];
$puesto_1 = $_POST["puesto_1"];
$puesto_2 = $_POST["puesto_2"];
$puesto_3 = $_POST["puesto_3"];
$puesto_4 = $_POST["puesto_4"];

include_once "../db/db.php";

$json = [];
try{
	$sql = "INSERT INTO apuestas_clasificacion (id_persona, puesto_1, puesto_2, puesto_3, puesto_4) VALUES ('$id', '$puesto_1', '$puesto_2', '$puesto_3', '$puesto_4')";
	$conexion->exec($sql);
	$json["error"] = false;
	$json["d"] = "d";
} catch(PDOException $e) {
	$json["error"] = true;
	$json["c"] = "c";
	if($e->getCode() == 23000 && $e->errorInfo[1] == 1062){
			$sql = "UPDATE apuestas_clasificacion SET puesto_1 = $puesto_1, puesto_2 = $puesto_2, puesto_3 = $puesto_3, puesto_4 = $puesto_4 WHERE id_persona = $id";
			$json["sql"] = $sql;
		try{
			$conexion->exec($sql);

			$json["error"] = false;
			$json["b"] = "b";
		}catch (PDOException $e){
			$json["error"] = true;
			$json["a"] = "A";
		}
	}
}
echo json_encode($json);
?>