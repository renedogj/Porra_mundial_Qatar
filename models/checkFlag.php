<?php
$idFlag = trim(addslashes($_POST["idFlag"]));
$flag = trim(addslashes($_POST["flag"]));

include_once "../db/db.php";

$sql = "SELECT id, max_puntos, num_pistas FROM flags WHERE id='$idFlag' AND flag='$flag'";

$flags = obtenerArraySQL($conexion, $sql);

$json = [];
if(isset($flags[0])){
	$json["flagCorrecto"] = true;
	$json["flag"] = $flag;

	$sql = "UPDATE flags SET resuelto = 1 WHERE id='$idFlag' AND flag='$flag'";
	$conexion->exec($sql);
}else{
	$json["flagCorrecto"] = false;
}

echo json_encode($json);
?>