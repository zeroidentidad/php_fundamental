<h2 class="page-header">
    <a href="?c=Home&a=crud" class="pull-right btn btn-primary">
        Nuevo empleado
    </a>
    Empleados
</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Nombre</th>
            <th style="width:100px;">Nacimiento</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($modelo) > 0): ?>
        <?php foreach($modelo as $m): ?>
        
        <tr>
            <td>
            <a href="?c=Home&a=crud&id=<?php echo $m->id; ?>">
            <?php echo $m->nombre; ?> <?php echo $m->apellido; ?>
            </a>
            </td>
            <td><?php echo $m->fecha_nacimiento; ?></td>
            <td><?php echo $m->profesion; ?></td>
            <td class="text-right">MXN <?php echo number_format($m->sueldo_inicial, 2); ?></td>
            <td class="text-right">MXN <?php echo number_format($m->sueldo_final, 2); ?></td>
            <td>
            <a href="?c=Home&a=eliminar&id=<?php echo $m->id; ?>" class="btn btn-xs btn-danger btn-block">
            Eliminar
            </a>
            </td>
        </tr>

        <?php endforeach; ?>   
        <?php endif; ?>
    </tbody>
</table>