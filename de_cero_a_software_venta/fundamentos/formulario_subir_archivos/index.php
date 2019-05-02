<!DOCTYPE html>
<html lang="es">
<head>
<title>Ejemplo formulario carga archivo</title>
<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="page-header">Formulario con archivos</h1>
        <form id="formulario" method="POST" action="procesa.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" />
            </div>
            <?php for($i = 1; $i <= 5; $i++): ?>
            <div class="form-group">
                <label>Archivo <?php echo $i; ?></label>
                <input type="file" name="archivo[]" class="form-control" />
            </div>
            <?php endfor; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>