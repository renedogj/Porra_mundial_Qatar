<?php
$idFlag = trim(addslashes($_POST["idFlag"]));
$flag = trim(addslashes($_POST["flag"]));

include_once "../db/db.php";

$sql = "SELECT id, max_puntos, num_pistas FROM flags WHERE id='$idFlag' and flag='$flag'";

$flag = obtenerArraySQL($conexion, $sql)[0];

echo json_encode($flag);
?>