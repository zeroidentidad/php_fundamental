<?php
require_once './vendor/autoload.php';

function db_connect(){
    $usr = "remoto";
    $pass = "x1234567";
    $dsn = "mysql:host=localhost;dbname=phpws";
    $opts = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    try {
        $db = new PDO($dsn, $usr, $pass, $opts);
        return $db;
    } catch (PDOException $e) {
        echo '<p>Error!: <mark>' . $e->getMessage() . '</mark></p>';
        die();
    }
}

function mostrarLibros(){

    $db = db_connect();

    $mysql = $db->prepare("SELECT * FROM libros");
    $mysql->execute();


    $resultado = $mysql->fetchAll(PDO::FETCH_ASSOC);

    $db = null;
    return $resultado;     
}


if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

$server = new soap_server();

$server->register("mostrarLibros");

$server->service($HTTP_RAW_POST_DATA);

exit;

?>