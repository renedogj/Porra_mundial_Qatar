<?php

session_start();
session_unset();
session_destroy();

setcookie("id", "", time() - 3600, "dificultades/dif1/");
setcookie("nombre", "", time() - 3600, "dificultades/dif1/");
setcookie("puntuacion", "", time() - 3600, "dificultades/dif1/");
setcookie("email", "", time() - 3600, "dificultades/dif1/");

setcookie("id", "", time() - 3600, "dificultades/dif2/");
setcookie("nombre", "", time() - 3600, "dificultades/dif2/");
setcookie("puntuacion", "", time() - 3600, "dificultades/dif2/");
setcookie("email", "", time() - 3600, "dificultades/dif2/");

setcookie("id", "", time() - 3600, "dificultades/dif3/");
setcookie("nombre", "", time() - 3600, "dificultades/dif3/");
setcookie("puntuacion", "", time() - 3600, "dificultades/dif3/");
setcookie("email", "", time() - 3600, "dificultades/dif3/");
?>