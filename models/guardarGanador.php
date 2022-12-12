<?php
$idPuesto_1 = $_POST["idPuesto_1"];
$idPuesto_2 = $_POST["idPuesto_2"];
$idPuesto_3 = $_POST["idPuesto_3"];
$idPuesto_4 = $_POST["idPuesto_4"];

include_once "../db/db.php";

$sql = "SELECT id_persona, puesto_1, puesto_2, puesto_3, puesto_4 from apuestas_clasificacion";

$apuestas = obtenerArraySQL($conexion, $sql);


?>