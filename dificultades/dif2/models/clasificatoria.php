<?php
session_start();
$id = $_COOKIE["id"];

include_once "../db/db.php";

$sql = "SELECT puesto_1, puesto_2, puesto_3, puesto_4 from apuestas_clasificacion where id_persona = $id";

$array = obtenerArraySQL($conexion, $sql);

echo json_encode($array);
?>