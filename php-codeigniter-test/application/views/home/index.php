<?php 
var_dump($data);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">En home</h1>
            <table class="table">
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?php echo $d['Nombre']; ?></td>
                        <td><?php echo $d['Apellido']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>