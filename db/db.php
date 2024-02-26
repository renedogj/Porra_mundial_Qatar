<?php
$servername = "localhost";
$username = "root";
$db_password = "";
$database = "tfm_gestion";

try {
	$conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $db_password); 	 	 	 	 	 	
	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	 	 	 	
} catch (PDOException $e) {
	echo $e->getMessage(); 	 	 	 	 	 	
}

function obtenerArraySQL($conexion, $sql){
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	//return new RecursiveArrayIterator($stmt->fetchAll());
	return $stmt->fetchAll();
}
?>
