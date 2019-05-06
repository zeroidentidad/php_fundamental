<?php
namespace App\Controllers;

class UserController {
    public function index(){
        $users = [
            'Jesus',
            'Karent',
            'Vero'
        ];

        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'user/index.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }
}