<?php
namespace App\Validations;
use Respect\Validation\Validator as v;
use App\Helpers\ResponseHelper;

class ClienteValidation {
    public static function validate (array $model) {
        try{
            $v = v::key('nombre', v::stringType()->length(5, null))
              ->key('direccion', v::stringType()->notEmpty());

            $v->assert($model);
        } catch (\Exception $e) {
            $rh = new ResponseHelper();
            $rh->setResponse(false, null);
            $rh->validations = $e->findMessages([
                'nombre' => '{{name}} debe tener como mínimo 5 caracteres',
                'direccion' => '{{name}} es requerido'
            ]);

            exit(json_encode($rh));
        }
    }
}