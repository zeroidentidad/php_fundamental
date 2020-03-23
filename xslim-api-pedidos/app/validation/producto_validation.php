<?php

namespace App\Validation;

use App\Lib\Response;

class ProductoValidation
{
    public static function validate($data, $update = false)
    {
        $response = new Response();

        $key = 'Nombre';
        if (empty($data[$key])) {
            $response->errors[$key][] = 'Este campo es obligatorio';
        } else {
            $value = $data[$key];

            if (strlen($value) < 4) {
                $response->errors[$key][] = 'Debe contener como mínimo 4 caracteres';
            }
        }

        $key = 'Precio';
        if (empty($data[$key])) {
            $response->errors[$key][] = 'Este campo es obligatorio';
        } else {
            $value = $data[$key];

            if (!is_numeric($value)) {
                $response->errors[$key][] = 'El valor ingresado no es un precio válido';
            }
        }

        $response->setResponse(count($response->errors) === 0);

        return $response;
    }
}
