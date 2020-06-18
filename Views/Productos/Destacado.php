<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?= Base_url ?>assets/css/Web.css">

    <title>Document</title>
</head>

<body>
    <nav id="menu" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= Base_url ?>">Ropa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php $category  = Utilidades::ShowCategorias(); ?>

                    <?php while ($cat = $category->fetch_object()) : ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= Base_url ?>categoria/ver&id=<?= $cat->idCATEGORIAS ?>" id="inicio"><?= $cat->Nombre ?></a>
                        </li>
                    <?php endwhile ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Base_url ?>persona/inicioS" id="session">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="row">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= Base_url ?>assets/img/marcas.jpg" class="d-block w-100" alt="..." style="height: 700px; width: 2000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= Base_url ?>assets/img/ropajj.jpg" class="d-block w-100" alt="..." style="height: 700px; width: 2000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= Base_url ?>assets/img/roparr.jpg" class="d-block w-100 " style="height: 700px; width: 2000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <?php if (isset($_SESSION['User'])) : ?>
                <div class="col-md-2">
                    <div class="card">
                        <h3 class="text-center"><strong>Bienvenido</strong></h3>
                        <h4 class="text-center"><?= $_SESSION['User']->Nombre ?> <?= $_SESSION['User']->Apellidos ?></h4>
                        <div class="card-body">
                            <?php $stats = Utilidades::statsCarro() ?>
                            <a href="" style="font-size: 18px; text-decoration: none;" class="text-info"><strong>Productos: (<?= $stats['count'] ?>)</strong></a>
                            <br>
                            <a href="" style="font-size: 18px; text-decoration: none;" class="text-info"><strong>Total: <?= $stats['total'] ?></strong></a>
                            <br>
                            <a href="<?= Base_url ?>carro/index" style="font-size: 18px; text-decoration: none;" class="text-success"><strong>Ver Carrito</strong></a>
                            <br>
                            <a href="<?= Base_url ?>persona/logaut" class="btn btn-block btn-danger mt-4">Cerrar sesion</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                <?php endif; ?>
                <div class="card" style="border-right:  4px solid #01B1EA; border-left:  4px solid #01B1EA;">
                    <div class="card-body">
                        <?php if (!isset($_SESSION['User'])) : ?>
                            <h4 class="text-center"><strong>Para realizar una compra es necesario registrarse o iniciar session</strong></h4>
                        <?php endif; ?>
                        <h2 class="text-center"><strong>Algunos de nuestros productos</strong></h2>
                        <hr>
                        <div class="row">
                            <?php while ($prod = $Productos->fetch_object()) : ?>
                                <div class="col-md-3">
                                    <div class="card mt-3">
                                        <?php if (isset($_SESSION['User'])) : ?>
                                            <img src="<?= Base_url ?>Upload/Imagenes/<?= $prod->Imagen ?>" class="card-img-top" style="height:200px; width: 200px; margin-left: 30px; margin-top:10px;"  alt="...">
                                        <?php else : ?>
                                            <img src="<?= Base_url ?>Upload/Imagenes/<?= $prod->Imagen ?>" class="card-img-top" style="height:200px; width: 200px; margin-left: 70px; margin-top:10px;"  alt="...">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <a href="<?= Base_url ?>producto/ver&id=<?= $prod->idPRODUCTOS ?>" style="text-decoration: none;" class="text-dark">
                                                <h3 class="card-title"><?= $prod->NombreP ?></h3>
                                                <h6><?= $prod->Descripcion ?></h6>
                                            </a>
                                            <p class="card-text text-danger"> precio $<?= $prod->Precio ?> | Desc <?= $prod->Oferta ?></p>
                                            <?php if (isset($_SESSION['User'])) : ?>
                                                <a href="<?= Base_url ?>carro/add&id=<?= $prod->idPRODUCTOS ?>" class="btn btn-success">Comprar</a>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-success mt-3" data-toggle="tooltip" data-placement="right" title="Inicie sesion para realizar la compra" disabled>Comprar</button>
                                            <?php endif; ?>
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
                </div>
        </div>

    </div>
</body>

</html>