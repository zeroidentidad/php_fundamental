<?php //var_dump($model); ?>

<h1 class="page-header">
    Pedido # <?php echo $model->id; ?>
</h1>

<ol class="breadcrumb">
    <li>
        <a href="<?php echo site_url('pedido'); ?>">Regresar</a>
    </li>
    <li class="active">
        Pedido #<?php echo $model->id; ?>
    </li>
</ol>

<div class="row">
    <div class="col-xs-4">
        <dl class="well">
            <dt>Empleado</dt>
            <dd><?php echo $model->Empleado; ?></dd>
            <dt>Estado</dt>
            <dd><?php echo $model->Estado; ?></dd>
            <dt>Total ($)</dt>
            <dd><?php echo $model->Total; ?></dd>
            <dt>Fecha</dt>
            <dd><?php echo $model->Fecha; ?></dd>
        </dl>
    </div>
    <div class="col-xs-8">
        <ul class="list-group">
            <?php foreach ($model->Detalle as $d) : ?>
                <li class="list-group-item">
                    <?php echo $d->Producto; ?>
                    <?php echo $d->Cantidad; ?> UND
                    <span class="pull-right">
                        <?php echo $d->Total; ?>
                    </span>
                </li>
            <?php endforeach; ?>
            <li class="list-group-item">
                <strong>Total</strong>
                <span class="pull-right badge">
                    $ <?php echo number_format($model->Total, 2); ?>
                </span>
            </li>
        </ul>
    </div>
</div>