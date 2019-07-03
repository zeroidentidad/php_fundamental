/*=============================================
VALIDAR INGRESO
=============================================*/
function validarIngreso() {

    var usuario = $gEBI("usuarioIngreso").value;

    var password = $gEBI("passwordIngreso").value;

    /* VALIDAR USUARIO */

    if (usuario != "") {

        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        //alert(usuario);

        if (caracteres > 6) {

            $qS("label[for='usuarioIngreso']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";

            return false;
        }

        if (!expresion.test(usuario)) {

            $qS("label[for='usuarioIngreso']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR PASSWORD */

    if (password != "") {

        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres < 6) {

            $qS("label[for='passwordIngreso']").innerHTML += "<br>Escriba por favor más de 6 caracteres.";

            return false;
        }

        if (!expresion.test(password)) {

            $qS("label[for='passwordIngreso']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    return true;

}
/*=====  FIN VALIDAR INGRESO  ======*/