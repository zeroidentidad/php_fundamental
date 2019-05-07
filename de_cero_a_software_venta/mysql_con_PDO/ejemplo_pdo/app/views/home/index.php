<h2 class="page-header">Home page</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:250px;">Nombre</th>
            <th>Apellido</th>
            <th style="width:100px;">Nacimiento</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($modelo) > 0): ?>
        <?php foreach($modelo as $m): ?>
        
        <tr>
            <td><?php echo $m->nombre; ?></td>
            <td><?php echo $m->apellido; ?></td>
            <td><?php echo $m->fecha_nacimiento; ?></td>
        </tr>

        <?php endforeach; ?>   
        <?php endif; ?>
    </tbody>
</table>