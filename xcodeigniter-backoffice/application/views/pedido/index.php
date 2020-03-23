<h1 class="page-header">
    Pedidos
</h1>

<ol class="breadcrumb">
    <li class="active">Pedidos</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Pedido</th>
            <th style="width:300px;">Empleado</th>
            <th style="width:140px;">Estado</th>
            <th style="width:140px;">Total</th>
            <th style="width:100px;"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Pedido #0001</td>
            <td>Zero</td>
            <td>Pendiente</td>
            <td class="text-right">14.00</td>
            <td class="text-center">
                <a class="btn btn-xs btn-block btn-success" href="<?php echo site_url('pedido/ver/1'); ?>">
                    Ver detalle
                </a>
            </td>
        </tr>
    </tbody>
</table>