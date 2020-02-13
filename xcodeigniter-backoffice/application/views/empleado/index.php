<?php //var_dump($model); ?>
<h1 class="page-header">
    <a class="pull-right btn btn-primary" href="<?php echo site_url('empleado/crud'); ?>">Registrar</a>
    Empleados
</h1>

<ol class="breadcrumb">
    <li class="active">Empleados</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:60px;"></th>
            <th>Nombre</th>
            <th>Correo</th>
            <th style="width:100px;">Admin</th>
            <th style="width:160px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $m) : ?>
            <tr>
                <td>
                    <?php if (!empty($m->Imagen)) : ?>
                        <img style="width:60px;" src="<?php echo $m->Imagen; ?>" alt="?php echo $m->Nombre; ?>" />
                    <?php endif; ?>
                </td>
                <td><?php echo $m->Nombre; ?></td>
                <td><?php echo $m->Correo; ?></td>
                <td><span class="badge badge-sucess"><?php echo $m->EsAdmin === '1' ? 'SI' : 'NO'; ?></span></td>
                <td class="text-center">
                    <a class="btn btn-xs btn-success" href="<?php echo site_url('empleado/crud/' . $m->id); ?>">
                        Editar
                    </a>
                    <a class="btn btn-xs btn-danger" href="<?php echo site_url('empleado/eliminar/' . $m->id); ?>" onclick="return confirm('¿Esta seguro de eliminar este empleado?');">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->pagination->create_links(); ?>