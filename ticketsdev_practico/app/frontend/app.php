<?php

require_once '../backend/config.php';
require_once '../backend/db.php';
require_once '../backend/send_mail.php';

function obtener_cupo($id_actividad){
    $sql = "SELECT a.id_actividad, a.bloque, a.disciplina, a.horario, a.cupo,
            (SELECT COUNT(*) FROM registro AS r WHERE r.id_actividad=a.id_actividad) AS registrados
            FROM actividades AS a WHERE a.id_actividad=?";

    $data = array($id_actividad);

    $result = db_query($sql,$data,true,true);

    return $result;
}

echo '<pre>';
var_dump(obtener_cupo('1B'));
echo '</pre>';