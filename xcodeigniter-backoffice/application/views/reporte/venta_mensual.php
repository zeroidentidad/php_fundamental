<?php
$type = gettype($model);
$types = array( 'array', 'object');
//var_dump($type);
?>
<h1 class="page-header">
    Venta Mensual
</h1>

<ol class="breadcrumb">
    <li class="active">Venta Mensual</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Periodo</th>
            <th class="text-right" style="width:200px;">Total (MXN)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (in_array($type, $types)) {
        foreach ($model as $m) : ?>
            <tr>
                <td><?php echo $m->periodo; ?></td>
                <td class="text-right"><?php echo number_format($m->total, 2); ?></td>
            </tr>
        <?php endforeach; } ?> 
    </tbody>
</table>