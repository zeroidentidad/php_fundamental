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

function crear_registro($email, $nombre, $apellido, $actividad){
    $registrado = existe_registro($email);

    if(!$registrado){
        $cupo = obtener_cupo($actividad);

        if ($cupo['registrados']==$cupo['cupo']) {
            $res = array('error'=>true, 'msg'=>'Horario y actividad sin cupo, elige otra.');
        } else {
            $sql = "CALL registrar_participante(?, ?, ?, ?)";
            $data = array($email, $nombre, $apellido, $actividad);

            $result = db_query($sql, $data);

            if ($result) {
                $res = array('error'=>false, 'msg'=>'Listo, tu registro fue creado.');
                $registro = existe_registro($email);
                enviar_email($registro);
            } else {
                $res = array('error'=>true, 'msg'=>'Ocurrio un error, reintentar.');
            }
        }
    } else {
        $res = array('error'=>true, 'msg'=>'El email ya fue registrado anteriormente.');
    }

    header('Content-type: application/json');
    echo json_encode($res);
}

function obtener_registros(){
    $sql = "SELECT p.email, p.nombre, p.apellido, a.bloque, a.disciplina, a.horario, r.fecha
            FROM registro AS r INNER JOIN actividades AS a ON a.id_actividad = r.id_actividad
            INNER JOIN participantes AS p ON p.email = r.email
            ORDER BY r.fecha, a.bloque, a.disciplina, a.horario";
            
    $result = db_query($sql,null,true);

    if (count($result)===0) {
        echo 'No hay registros.';
    } else {
        return $result;
    }    
}

function eliminar_registro($email){
    $sql = "CALL eliminar_participante(?)";
    $data = array($email);
    $result = db_query($sql,$data);
    return $result;
}

/*echo '<pre>';
var_dump(obtener_cupo('1B'));
echo '</pre>';*/

//obtener_horarios('BACKEND');

/*echo '<pre>';
var_dump(existe_registro('test@mail.com'));
echo '</pre>';*/

/*echo '<pre>';
var_dump(crear_registro('test4@mail.com', 'Jesus4', 'Ferrer', '1B'));
echo '</pre>';*/

/*echo '<pre>';
var_dump(obtener_registros());
echo '</pre>';*/

/*echo '<pre>';
var_dump(eliminar_registro('test4@mail.com'));
echo '</pre>';*/