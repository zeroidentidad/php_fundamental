<?php
$type = gettype($model);
$types = array('array', 'object');
//var_dump($model); 
?>
<h1 class="page-header">
    <a class="pull-right btn btn-primary" href="<?php echo site_url('producto/crud'); ?>">Registrar</a>
    Productos
</h1>

<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado Productos</h5>
          </div>
<div class="widget-content nopadding">     
<table id="DataTables_Table_0" class="table table-striped table-bordered  data-table">
    <thead>
        <tr>
            <th style="width:60px;"></th>
            <th>Nombre</th>
            <th style="width:160px;" class="text-right">Precio ($)</th>
            <th style="width:160px;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (in_array($type, $types)) {
        foreach($model as $m): ?>
        <tr>
            <td>
            <?php if(!empty($m->Imagen)): ?>
                <img style="width:60px; height:60px;" src="<?php echo $m->Imagen; ?>"  alt="<?php echo $m->Nombre; ?>" />
                <?php endif; ?>
            </td>
            <td><?php echo $m->Nombre; ?></td>
            <td class="text-right"><?php echo $m->Precio; ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-success" href="<?php echo site_url('producto/crud/' . $m->id); ?>">
                    Editar
                </a>
                <a class="btn btn-xs btn-danger" href="<?php echo site_url('producto/eliminar/' . $m->id); ?>" onclick="return confirm('¿Esta seguro de eliminar este producto?');">
                    Eliminar
                </a>
            </td>
        </tr>
  <?php endforeach; } ?>
    </tbody>
</table>

</div>

</div>

<?php echo $this->pagination->create_links(); ?>