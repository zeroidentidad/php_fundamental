<?php

function db_connect(){
    $dsn = DB['dsn'];
    $user = DB['user'];
    $pass = DB['pass'];
    $opts = array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');

    try {
        $db = new PDO($dsn,$user,$pass,$opts); 
        return $db;
    } catch (PDOException $e) {
        echo '<p>Error!: <mark>'.$e->getMessage().'</mark></p>';
        die();
    }
}

function db_query($sql, $data=array(), $is_query=false, $query_one=false){
    $db = db_connect();

    $mysql = $db->prepare($sql);
    $mysql->execute($data);

    if($is_query){
        //SELECT
        if ($query_one) {
            // un registro
            $result = $mysql->fetch(PDO::FETCH_ASSOC);
        } else {
            // todos
            $result = $mysql->fetchAll(PDO::FETCH_ASSOC);
        }

        $db = null;
        return $result;        
    } else {
        //INSERT, UPDATE, DELETE

        $db=null;
        return true;
    }
}