<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Ejemplo formulario con AJAX</title>
<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
 
<body>
    <div class="container">
        <h1 class="page-header">Formulario con AJAX</h1>
        <form id="formulario" method="POST" action="procesa.php">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" />
            </div>
            <div class="form-group">
                <label>Ocupación</label>
                <select class="form-control" name="ocupacion">
                    <option value="ingeniero-sistema">Ingeniero de sistemas</option>
                    <option value="medico">Médico</option>
                    <option value="abogado">Abogados</option>
                    <option value="arquitecto">Arquitecto</option>
                </select>
            </div>
            <div class="form-group">
                <label>Sexo</label>
                <div class="radio">
                    <label><input type="radio" name="sexo" value="hombre">Hombre</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="sexo" value="mujer">Mujer</label>
                </div>
            </div>
            <div class="form-group">
                <label>Acerca de mí</label>
                <textarea class="form-control" name="acerca_de_mi"></textarea>
            </div>
            <div class="well well-sm">
                <h4> Ingrese los datos de sus hijos</h4>
                <?php for($i = 0; $i <= 4; $i++): ?>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label>Hijo N° <?php echo $i + 1; ?></label>
                            <input type="text" name="hijo[<?php echo $i; ?>][nombre]" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="text" name="hijo[<?php echo $i; ?>][edad]" class="form-control" />
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="acepto" value="1"> Acepto las condiciones</label>
                </div>
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
            $.ajax({
                url: "procesa.php",
                method: "POST",
                data: form.serialize(),
                // data: { 
                //     nombre: $("input[name='nombre']").val(),
                //     ocupacion: $("select[name='ocupacion']").val(),
                //     sexo: $("input[name='sexo']").val(),
                //     acerca_de_mi: $("textarea[name='acerca_de_mi']").val(),
                // },
                success: function(r){
                    alert(r.response);
                },  
                dataType: "json"
            });
            return false;
        })
    })
    </script>
</body>
</html>