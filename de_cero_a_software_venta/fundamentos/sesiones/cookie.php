<?php
//cookie : lado cliente

setcookie(
    "frutas", //clave id
    "piña, coco", //valor
    /*serialize(["coco","piña"])*/ // valor serializado
    time()+60 // tiempo de vida
) // un minuto al tiempo de crearse

?>