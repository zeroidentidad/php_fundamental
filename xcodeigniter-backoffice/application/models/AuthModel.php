<?php
class AuthModel extends CI_Model
{
    public function autenticar($correo, $password)
    {
        return RestApi::call(
            RestApiMethod::POST,
            "auth/autenticar",
            [
                'Correo' => $correo,
                'Password' => $password,
            ]
        );
    }
}
