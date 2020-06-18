<?php require_once 'Views/sidebar.php';?>

<!-- DataTables Example -->
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?=Base_url?>persona/All">Ver tabla</a>
        </li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Tabla de categorias</div>
        <div class="card-body">

            <?php if (isset($_SESSION['Agregado'])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Agregado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['Editado'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Editado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['Borrado'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Borrado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php Utilidades::DeleteSession(); ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead  class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($persona = $PERSONAS->fetch_object()) :?>
                        <tr>
                            <td><?=$persona->idUSUARIOS?></td>
                            <td><?=$persona->Nombre?></td>
                            <td><?=$persona->Apellidos?></td>
                            <td><?=$persona->Email?></td>
                            <td><?=$persona->Rol?></td>
                            <td>
                                <a href="<?=Base_url?>persona/delete&id=<?=$persona->idUSUARIOS?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                <a href="<?=Base_url?>persona/See&id=<?=$persona->idUSUARIOS?>" class="btn btn-info btn-sm mt-1"><i class="fas fa-eye"></i></a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <tbody>
                    <tfoot  class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>


                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

<?php require_once 'Views/Layout/footer2.php';?>
