
<?php require_once 'Views/sidebar.php'; ?>
<!-- Area Chart Example-->
<div class="container-fluid">
    <div class="card mb-3">

        <?php if (isset($Pedido)) : ?>
        <div class="card-header">
            Pedidos Persona <strong> N° <?= $Pedido->idPEDIDOS ?></strong>
            <i class="fas fa-chart-area"></i>
        </div>
        <div class="card-body">

                <ul>
                <li><strong>Total a pagar:</strong> <?= $Pedido->Coste ?></li>
                <li><strong>Direccion:</strong> <?= $Pedido->Direccion ?></li>
                <li><strong>Localidad:</strong> <?= $Pedido->Localidad ?></li>
                <li><strong>Direccion:</strong> <?= $Pedido->Direccion ?></li>
                </ul>

            <table class="table table-bordered table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($producto = $PRODUCTOS->fetch_object()) :?>
                    <tr class="text-center">
                        <td><img src="<?= Base_url ?>Upload/Imagenes/<?= $producto->Imagen ?>" style="height: 100px; width: 100px;"></td>
                        <td><a  class="text-info" style="text-decoration: none; font-size: 20px;"><?= $producto->NombreP ?></a></td>
                        <td><?= $producto->Precio ?></td>
                        <td><?= $producto->Unidades ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <?php else: ?>

                nadaaaa
                <?php endif; ?>


            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php'; ?>
