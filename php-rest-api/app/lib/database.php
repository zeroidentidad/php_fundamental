<?php
namespace App\Lib;

use FluentPdo;
use PDO;

class DataBase {
    public static function StartUp() {
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'remoto', 'x1234567');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            
            return new FluentPDO($pdo);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
    }
}