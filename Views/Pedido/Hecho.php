<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?= Base_url ?>assets/css/Web.css">

    <title>Document</title>
</head>

<body>
<nav id="menu" class="navbar navbar-expand-lg fixed-top" style="background: rgba(37, 37, 35,  0.7)">
    <div class="container">
        <a class="navbar-brand" href="<?= Base_url ?>">Ropa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php $category = Utilidades::ShowCategorias(); ?>

                <?php while ($cat = $category->fetch_object()) : ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= Base_url ?>categoria/ver&id=<?= $cat->idCATEGORIAS ?>"
                           id="inicio"><?= $cat->Nombre ?></a>
                    </li>
                <?php endwhile ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Base_url ?>persona/inicioS" id="session">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid" style="margin-top: 100PX;">

    <?php if (isset($_SESSION['User'])) : ?>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <h3 class="text-center"><strong>Bienvenido</strong></h3>
                <h4 class="text-center"><?= $_SESSION['User']->Nombre ?> <?= $_SESSION['User']->Apellidos ?></h4>
                <div class="card-body">
                    <?php $stats = Utilidades::statsCarro() ?>
                    <a href="" style="font-size: 18px; text-decoration: none;" class="text-info"><strong>Productos:
                            (<?= $stats['count'] ?>)</strong></a>
                    <br>
                    <a href="" style="font-size: 18px; text-decoration: none;"
                       class="text-info"><strong>Total: <?= $stats['total'] ?></strong></a>
                    <br>
                    <a href="<?= Base_url ?>carro/index" style="font-size: 18px; text-decoration: none;"
                       class="text-success"><strong>Ver Carrito</strong></a>
                    <br>
                    <a href="<?= Base_url ?>persona/logaut" class="btn btn-block btn-danger mt-4">Cerrar sesion</a>
                </div>
            </div>
        </div>
        <div class="col-md-10">

            <div class="card" style="border-right:  4px solid #01B1EA; border-left:  4px solid #01B1EA;">
                <div class="card-body">

                    <?php if (isset($_SESSION['Agregado'])) : ?>
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <strong><?= $_SESSION['Agregado'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


                        </div>
                    <?php endif; ?>


                    <p>Tu pedido ha sido guardado con exito, una vez que realice la transaion bancario a la cuenta
                        1243829229 tendra un lapso de 2 dias para tener el pedido en sus manos
                        en caso de no llegar comuniate al 31312232321</p>
                    <h3>Datos del pedido:</h3>
                    <ul>
                        <li><strong>Id de tu pedido:</strong> <?= $Producto->idPEDIDOS ?></li>
                        <li><strong>Total a pagar:</strong> <?= $Producto->Coste ?></li>
                    </ul>

                        Productos Comprados:


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
                                    <td><a href="<?= Base_url ?>producto/ver&id=<?= $producto->idPRODUCTOS ?>" class="text-info" style="text-decoration: none; font-size: 20px;"><?= $producto->NombreP ?></a></td>
                                    <td><?= $producto->Precio ?></td>
                                    <td><?= $producto->Unidades ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

