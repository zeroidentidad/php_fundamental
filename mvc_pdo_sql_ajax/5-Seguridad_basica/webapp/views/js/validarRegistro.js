/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro() {

    var usuario = $gEBI("#usuarioRegistro").value;

    var password = $gEBI("#passwordRegistro").value;

    var email = $gEBI("#emailRegistro").value;

    var terminos = $gEBI("#terminos").checked;

    /* VALIDAR USUARIO */

    if (usuario != "") {

        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres > 6) {

            $qS("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";

            return false;
        }

        if (!expresion.test(usuario)) {

            $qS("label[for='usuarioRegistro']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR PASSWORD */

    if (password != "") {

        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres < 6) {

            $qS("label[for='passwordRegistro']").innerHTML += "<br>Escriba por favor más de 6 caracteres.";

            return false;
        }

        if (!expresion.test(password)) {

            $qS("label[for='passwordRegistro']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR EMAIL*/

    if (email != "") {

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email)) {

            $qS("label[for='emailRegistro']").innerHTML += "<br>Escriba correctamente el Email.";

            return false;

        }

    }

    /* VALIDAR TÉRMINOS*/

    if (!terminos) {

        $qS("form").innerHTML += "<br>No se hizo registro, debe aceptar términos y condiciones!.";
        $gEBI("#usuarioRegistro").value = usuario;
        $gEBI("#passwordRegistro").value = password;
        $gEBI("#emailRegistro").value = email;

        return false;
    }

    return true;

}
/*=====  FIN VALIDAR REGISTRO  ======*/