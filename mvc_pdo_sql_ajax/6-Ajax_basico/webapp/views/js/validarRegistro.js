/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/
var usuarioExistente = false;
var emailExistente = false;

$("#usuarioRegistro").change(function () {

    var usuario = $("#usuarioRegistro").val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 0) {
                $("label[for='usuarioRegistro'] span").html('<p>Este usuario ya existe en la base de datos</p>');
                usuarioExistente = true;
            }
            else {
                $("label[for='usuarioRegistro'] span").html("");
                usuarioExistente = false;
            }
        }

    });

});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR EMAIL EXISTENTE AJAX
=============================================*/

$("#emailRegistro").change(function () {

    var email = $("#emailRegistro").val();

    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 0) {
                $("label[for='emailRegistro'] span").html('<p>Este email ya existe en la base de datos</p>');
                emailExistente = true;
            }
            else {
                $("label[for='emailRegistro'] span").html("");
                emailExistente = false;
            }
        }

    });

});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro() {

    var usuario = $gEBI("usuarioRegistro").value;

    var password = $gEBI("passwordRegistro").value;

    var email = $gEBI("emailRegistro").value;

    var terminos = $gEBI("terminos").checked;

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

        if (usuarioExistente) {

            document.querySelector("label[for='usuarioRegistro'] span").innerHTML = "<p>Este usuario ya existe en la base de datos</p>";

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

        if (emailExistente) {

            document.querySelector("label[for='emailRegistro'] span").innerHTML = "<p>Este email ya existe en la base de datos</p>";

            return false;
        }        

    }

    /* VALIDAR TÉRMINOS*/

    if (!terminos) {

        $qS("form").innerHTML += "<br>No se hizo registro, debe aceptar términos y condiciones!.";
        $gEBI("usuarioRegistro").value = usuario;
        $gEBI("passwordRegistro").value = password;
        $gEBI("emailRegistro").value = email;

        return false;
    }

    return true;

}
/*=====  FIN VALIDAR REGISTRO  ======*/