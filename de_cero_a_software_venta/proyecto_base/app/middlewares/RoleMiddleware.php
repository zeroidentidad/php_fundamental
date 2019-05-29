<?php
namespace App\Middlewares;

use Core\Auth;

class RoleMiddleware {
    public static function isAdmin() {
        $user = Auth::getCurrentUser();
        return $user->rol_id === 1;
    }

    public static function isSeller() {
        $user = Auth::getCurrentUser();
        return $user->rol_id === 2 || $user->rol_id === 1;
    }

    public static function isAnalyst() {
        $user = Auth::getCurrentUser();
        return $user->rol_id === 3 || $user->rol_id === 1;
    }
}