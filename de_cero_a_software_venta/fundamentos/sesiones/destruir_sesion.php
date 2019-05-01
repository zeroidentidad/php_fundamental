<?php
session_start();
unset($_SESSION["frutas"]);
//var_dump($_SESSION["frutas"]);

// eliminar completamente las sesiones actuales
session_destroy();

?>