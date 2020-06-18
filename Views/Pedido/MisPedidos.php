<?php require_once 'Views/sidebar.php'; ?>
<!-- Area Chart Example-->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            Pedidos Pendientes
            <i class="fas fa-chart-area"></i>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>N° Pedido</th>
                        <th>Coste</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($Pedido = $PEDIDOS->fetch_object()) : ?>
                        <tr class="text-center">
                            <td><a href="<?=Base_url?>pedidos/OnePedido&id=<?=$Pedido->idPEDIDOS?>"><?= $Pedido->idPEDIDOS ?></a></td>
                            <td><?= $Pedido->Coste ?></td>
                            <td><?= $Pedido->Fecha ?></td>
                            <?php if ($Pedido->Estado == 'Confirmar') : ?>
                                <td class="text-danger"><?= $Pedido->Estado ?></td>
                            <?php else: ?>
                                <td class="text-success"><?= $Pedido->Estado ?></td>
                            <?php endif; ?>
                            <td>
                                <?php if ($Pedido->Estado == 'Confirmar') : ?>
                                    <a href="<?= Base_url ?>pedidos/confirmado&id=<?= $Pedido->idPEDIDOS ?>"
                                       class="btn btn-info btn-sm"><i class="fas fa-check"></i></i></a>
                        <?php else: ?>
                                    <a href="<?= Base_url ?>pedidos/confirmar&id=<?= $Pedido->idPEDIDOS ?>"
                                       class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                        <?php endif; ?>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <tbody>
                    <tfoot class="thead-dark">
                    <tr>
                        <th>N° Pedido</th>
                        <th>Coste</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>


                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php'; ?>
