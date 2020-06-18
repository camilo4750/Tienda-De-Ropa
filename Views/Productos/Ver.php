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


<?php if (isset($_SESSION['User'])) : ?>
<div class="container-fluid" style="margin-top: 200px;">

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <h3 class="text-center"><strong>Bienvenido</strong></h3>
                <h4 class="text-center"><?= $_SESSION['User']->Nombre ?>  <?= $_SESSION['User']->Apellidos ?></h4>
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
            <?php endif; ?>

            <?php if (!isset($_SESSION['User'])) : ?>
            <div class="container" style="margin-top: 150px;">
                <?php endif; ?>
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
                                    <?php if (isset($_SESSION['User'])) : ?>
                                        <a href="<?= Base_url ?>carro/add&id=<?= $producto->idPRODUCTOS ?>"
                                           class="btn btn-success mt-3" style="margin-left: 350px">Comprar</a>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-success mt-3" style="margin-left: 350px"
                                                data-toggle="tooltip" data-placement="right"
                                                title="Inicie sesion para realizar la compra" disabled>Comprar
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid" style="margin-top: 110px">
            <div class="card-body">
                <h2 class="text-center"><strong>Mas de nuestros productos</strong></h2>
                <hr>
                <div class="row">
                    <?php while ($prod = $random->fetch_object()) : ?>
                        <div class="col-md-3">
                            <div class="card mt-3">
                                <img src="<?= Base_url ?>Upload/Imagenes/<?= $prod->Imagen ?>" class="card-img-top"
                                     style="height:200px; width: 200px; margin-left: 40px; margin-top:10px;"
                                     alt="...">
                                <div class="card-body">
                                    <a href="<?= Base_url ?>producto/ver&id=<?= $prod->idPRODUCTOS ?>"
                                       style="text-decoration: none;" class="text-dark">
                                        <h3 class="card-title"><?= $prod->NombreP ?></h3>
                                        <h6><?= $prod->Descripcion ?></h6>
                                    </a>
                                    <p class="card-text text-danger"> precio $<?= $prod->Precio ?> |
                                        Desc <?= $prod->Oferta ?></p>
                                    <a href="" class="btn btn-success">Comprar</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">agregado <?= $prod->Fecha ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="container my-5"
        <?php if (isset($_SESSION['Agregado'])) : ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><?= $_SESSION['Agregado'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php Utilidades::DeleteSession(); ?>
        <h3>Comentarios:</h3>
        <hr>
        <?php while ($comentario = $COMENTARIO->fetch_object()) : ?>
            <?php if ($comentario->idPRODUCTOS == $producto->idPRODUCTOS) : ?>
                <div class="media border mt-3">
                    <img src="<?= Base_url ?>assets/img/User_Circle.png" style="width: 80px; height: 80px"
                         class="my-2 ml-3" alt="perfil">
                    <div class="media-body ml-3 my-2">
                        <strong style="font-size: 23px"><?= $comentario->Email ?>
                            - <?= $comentario->Nombre ?> <?= $comentario->Apellidos ?></strong>
                        <p class="px-3 py-2"><strong>Comentario:</strong> <?= $comentario->Comentario ?> </p>
                    </div>
                    <div>
                        <strong><?= $comentario->Fecha ?></strong>
                        <?php if (isset($_SESSION['User']) && $_SESSION['User']->idUSUARIOS == $comentario->idUSUARIOS) : ?>
                            <a href="<?=Base_url?>producto/ElComentario&id=<?=$comentario->idCOMENTARIOS?>" class="btn btn-danger btn-sm text-white my-4 mx-3">Eliminar</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm text-white my-4 mx-3" data-toggle="modal" data-target="#staticBackdrop">
                              Editar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Comentario: <?= $comentario->idCOMENTARIOS ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= Base_url ?>producto/SaveC&id=<?=$comentario->idCOMENTARIOS?>" method="post">
                                                <label>Prenda:</label>
                                                <input type="number" class="form-control" name="idPRODUCTOS"
                                                       value="<?= $producto->idPRODUCTOS ?>">
                                                <label for="">Usuarios</label>
                                                <input type="number" class="form-control" name="idUSUARIOS"
                                                       value="<?= $_SESSION['User']->idUSUARIOS ?>">
                                                <label for=""> Comentario:</label>
                                                <input type="text" name="Comentario" class="form-control" value="<?=$comentario->Comentario?>">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Agregar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#staticBackdrop">
            Agregar Comentario
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Comentar: <?= $producto->NombreP ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= Base_url ?>producto/SaveC" method="post">
                            <label>Prenda:</label>
                            <input type="number" class="form-control" name="idPRODUCTOS"
                                   value="<?= $producto->idPRODUCTOS ?>">
                            <label for="">Usuarios</label>
                            <input type="number" class="form-control" name="idUSUARIOS"
                                   value="<?= $_SESSION['User']->idUSUARIOS ?>">
                            <label for=""> Comentario:</label>
                            <input type="text" name="Comentario" class="form-control">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Agregar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>