<?php

session_start();
session_unset();
session_destroy();

setcookie("id", "", time() - 3600, "/mundial%20qatar/dificultades/dif1/");
setcookie("nombre", "", time() - 3600, "/mundial%20qatar/dificultades/dif1/");
setcookie("puntuacion", "", time() - 3600, "/mundial%20qatar/dificultades/dif1/");
setcookie("email", "", time() - 3600, "/mundial%20qatar/dificultades/dif1/");

setcookie("id", "", time() - 3600, "/mundial%20qatar/dificultades/dif2/");
setcookie("nombre", "", time() - 3600, "/mundial%20qatar/dificultades/dif2/");
setcookie("puntuacion", "", time() - 3600, "/mundial%20qatar/dificultades/dif2/");
setcookie("email", "", time() - 3600, "/mundial%20qatar/dificultades/dif2/");

setcookie("id", "", time() - 3600, "/mundial%20qatar/dificultades/dif3/");
setcookie("nombre", "", time() - 3600, "/mundial%20qatar/dificultades/dif3/");
setcookie("puntuacion", "", time() - 3600, "/mundial%20qatar/dificultades/dif3/");
setcookie("email", "", time() - 3600, "/mundial%20qatar/dificultades/dif3/");
?>