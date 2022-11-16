<?php

include_once "../db/db.php";

$sql = "SELECT * from equipos order by grupo";

$partidos = obtenerArraySQL($conexion, $sql);

echo json_encode($partidos);
?>