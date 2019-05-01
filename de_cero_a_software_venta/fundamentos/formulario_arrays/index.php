<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Ejemplo de fomrulario</title>
<meta charset="utf-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
 
<body>
    <div class="container">
        <h1 class="page-header">Formulario con Array</h1>
        <form method="POST" action="procesa.php">
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
</body>
</html>