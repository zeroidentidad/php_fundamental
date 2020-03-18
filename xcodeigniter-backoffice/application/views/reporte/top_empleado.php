<?php
$type = gettype($model);
$types = array('array', 'object');
//var_dump($type);
?>
<h1 class="page-header">
    Top Empleados
</h1>

<ol class="breadcrumb">
    <li class="active">Top Empleados</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:60px;"></th>
            <th>Empleado</th>
            <th class="text-right" style="width:200px;">Pedidos realizados</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (in_array($type, $types)) {
        foreach ($model as $m) : ?>
            <tr>
                <td>
                    <?php if (!empty($m->Imagen)) : ?>
                        <img style="width:60px; height:60px;" src="<?php echo $m->Imagen; ?>" alt="<?php $m->Nombre; ?>" />
                    <?php endif; ?>
                </td>
                <td><?php echo $m->Nombre; ?></td>
                <td class="text-right"><?php echo $m->pedidos; ?></td>
            </tr>
        <?php endforeach; } ?>
    </tbody>
</table>