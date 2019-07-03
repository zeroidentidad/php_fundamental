/*=============================================
VALIDAR EDITAR
=============================================*/
function validarCambio() {

    var usuario = $gEBI("usuarioEditar").value;

    var password = $gEBI("passwordEditar").value;

    var email = $gEBI("emailEditar").value;

    /* VALIDAR USUARIO */

    if (usuario != "") {

        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres > 6) {

            $qS("label[for='usuarioEditar']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";

            return false;
        }

        if (!expresion.test(usuario)) {

            $qS("label[for='usuarioEditar']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR PASSWORD */

    if (password != "") {

        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres < 6) {

            $qS("label[for='passwordEditar']").innerHTML += "<br>Escriba por favor más de 6 caracteres.";

            return false;
        }

        if (!expresion.test(password)) {

            $qS("label[for='passwordEditar']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR EMAIL*/

    if (email != "") {

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email)) {

            $qS("label[for='emailEditar']").innerHTML += "<br>Escriba correctamente el Email.";

            return false;

        }

    }

    return true;

}
/*=====  FIN VALIDAR EDITAR  ======*/