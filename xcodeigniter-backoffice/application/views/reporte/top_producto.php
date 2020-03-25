<?php
$type = gettype($model);
$types = array('array', 'object');
//var_dump($type);
?>
<h1 class="page-header">
    Top Productos
</h1>

<ol class="breadcrumb">
    <li class="active">Top Productos</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:60px;"></th>
            <th>Productos</th>
            <th class="text-right" style="width:200px;">Unidades</th>
            <th class="text-right" style="width:200px;">Total (MXN)</th>
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
                <td class="text-right"><?php echo $m->cantidad; ?></td>
                <td class="text-right"><?php echo number_format($m->total, 2); ?></td>
            </tr>
        <?php endforeach; } ?>
    </tbody>
</table>