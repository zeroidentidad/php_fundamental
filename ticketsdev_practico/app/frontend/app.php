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

function obtener_horarios($disciplina){
    $sql = "SELECT * FROM actividades WHERE disciplina=? ORDER BY id_actividad";

    $data = array($disciplina);

    $result = db_query($sql,$data,true);

    if (count($result)===0) {
        echo 'No hay horarios '.$disciplina;
    } else {
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }

    return $result;    
}

function existe_registro($email){
    $sql = "SELECT p.email, p.nombre, p.apellido, a.bloque, a.disciplina, a.horario, r.fecha
            FROM registro AS r INNER JOIN actividades AS a ON a.id_actividad = r.id_actividad
            INNER JOIN participantes AS p ON p.email = r.email
            WHERE r.email = ?";

    $data = array($email);

    $result = db_query($sql, $data, true, true);

    return $result;
}

/*echo '<pre>';
var_dump(obtener_cupo('1B'));
echo '</pre>';*/

//obtener_horarios('BACKEND');

echo '<pre>';
var_dump(existe_registro('test@mail.com'));
echo '</pre>';