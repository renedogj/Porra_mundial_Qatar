<?php
$servername = "localhost";
$username = "root";
$db_password = "password";
$database = "mundial_qatar";

$hash = "62c44b8280176bfe405dc856d6f6ba98";

if($hash == md5_file("../sql/mundial_qatar.sql")){
    $conn = mysqli_connect($servername, $username, $db_password, $database);
    $fileSqlMundialQatar = fopen("../sql/mundial_qatar.sql", "r");

    // Linea donde vamos montando la sentencia actual
    $temp = '';

    // Flag para controlar los comentarios multi-linea
    $comentario_multilinea = false;

    while(!feof($fileSqlMundialQatar)) {
        $linea = fgets($fileSqlMundialQatar);

        $linea = trim($linea); // Quitamos espacios/tabuladores por delante y por detrás

        // Si es una linea en blanco o tiene un comentario nos la saltamos
        if ( (substr($linea, 0, 2) == '--') or (substr($linea, 0, 1) == '#') or ($linea == '') )
            continue;

        // Saltamos los comentarios multilinea /* texto */ Se detecta cuando empiezan y cuando acaban mediante estos dos ifs  
        if ( substr($linea, 0, 2) == '/*' ) $comentario_multilinea = true;

        if ( $comentario_multilinea ) {
           if ( (substr($linea, -2, 2) == '*/') or (substr($linea, -3, 3) == '*/;') ) $comentario_multilinea = false;
           continue;
        }

        // Añadimos la linea actual a la sentencia en la que estamos trabajando 
        $temp .= $linea;

        // Si la linea acaba en ; hemos encontrado el final de la sentencia
        if (substr($linea, -1, 1) == ';') {
            // Ejecutamos la consulta
            mysqli_query($conn, $temp) or print('<strong>Error en la consulta</strong> \'' . $temp . '\' - ' . mysqli_error($conn) . "<br /><br />\n");
            // Limpiamos sentencia temporal
            $temp = '';
        }
    }
}else{
    print('Archivo sql incorrecto');
}

?>