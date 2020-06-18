<?php require_once 'Views/sidebar.php' ?>

<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-success" href="<?=Base_url?>producto/crear">Crear</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?=Base_url?>producto/gestionar">Ver tabla</a>
        </li>
    </ol>
    <div class="card" style="border-right:  4px solid #01B1EA; border-left:  4px solid #01B1EA;">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <img src="<?= Base_url ?>Upload/Imagenes/<?= $producto->Imagen ?>"
                         style="height: 350px; width: 350px; margin-top: 10px;" alt="Producto">
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="mt-3">
                        <h2 class="text-center text-dark"><strong><?= $producto->NombreP ?></strong></h2>
                        <h3 class="text-center text-dark mt-3"><?= $producto->Descripcion ?></h3>
                        <h5 class="text-center text-danger">Precio: <?= $producto->Precio ?> |
                            Descuento: <?= $producto->Oferta ?></h5>
                        <h5 class="text-center text-dark">Prendas en bodega: <?= $producto->Stock ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php' ?>
