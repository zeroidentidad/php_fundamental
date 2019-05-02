<!DOCTYPE html>
<html lang="es">
<head>
<title>Ejemplo formulario validación AJAX</title>
<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
 
<body>
    <div class="container">
        <h1 class="page-header">Formulario con validación AJAX</h1>
        <form id="formulario" method="POST" action="procesa.php">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" />
                <span data-key="nombre" class="label label-danger"></span>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="text" name="correo" class="form-control" />
                <span data-key="correo" class="label label-danger"></span>
            </div>
            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="text" name="fecha" class="form-control" />
                <span data-key="fecha" class="label label-danger"></span>
            </div>

            <div class="form-group">
                <label>Página web</label>
                <input type="text" name="web" class="form-control" />
                <span data-key="web" class="label label-danger"></span>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="acepto" value="1"> Acepto las condiciones.</label>
                </div>
                <span data-key="acepto" class="label label-danger"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="http://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function(){

        var form = $("#formulario");

        form.submit(function(){
            
            form.find('.label-danger').text('');

            $.ajax({
                url: "procesa.php",
                method: "POST",
                data: form.serialize(),
                success: function(r){
                    if(!r.response) {
                        for(var k in r.errors){
                            $("span[data-key='" + k + "']").text(r.errors[k]);
                        }
                    }
                },  
                dataType: "json"
            });
            
            return false;

        })
    })
    </script>
</body>
</html>