<?php
$titulo = 'Nuevo registro';
$esAdmin = false;

if (is_object($model)) {
    $titulo = $model->Nombre;
    $esAdmin = ($model->EsAdmin === '1');
}
?>

<h1 class="page-header">
    <?php echo $titulo; ?>
</h1>

<ol class="breadcrumb">
    <li>
        <a href="<?php echo site_url('empleado'); ?>">Empleados</a>
    </li>
    <li class="active">
        <?php echo $titulo; ?>
    </li>
</ol>

<?php echo form_open('empleado/guardar', ['enctype' => 'multipart/form-data']); ?>

<input type="hidden" name="id" value="<?php echo is_object($model) ? $model->id : ''; ?>" />

<div class="form-group">
    <label>Admin</label>
    <select name="EsAdmin" class="form-control">
        <option <?php !$esAdmin ? 'selected' : ''; ?> value="0">NO</option>
        <option <?php $esAdmin ? 'selected' : ''; ?> value="1">SI</option>
    </select>
</div>

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nombre" class="form-control" placeholder="Ingrese el nombre" value="<?php echo is_object($model) ? $model->Nombre : ''; ?>">
</div>

<div class="form-group">
    <label>Correo</label>
    <input type="text" name="Correo" class="form-control" placeholder="Ingrese el correo" value="<?php echo is_object($model) ? $model->Correo : ''; ?>">
</div>

<div class="form-group">
    <label>Password</label>
    <input type="text" name="Password" class="form-control" placeholder="Ingrese el password">
</div>

<div class="form-group">
    <label>Imagen</label>
    <input type="file" name="File" class="form-control">
</div>

<button class="btn btn-primary" type="submit">
    Enviar
</button>

<?php echo form_close(); ?>