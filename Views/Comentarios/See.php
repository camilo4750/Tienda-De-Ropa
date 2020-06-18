<?php require_once 'Views/sidebar.php'; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?=Base_url?>producto/Gcomentarios">Ver tabla Comentarios</a>
        </li>
    </ol>

    <div class="card">
        <div class="card-header"> <i class="fas fa-table"></i> Tabla Comentario </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>Campo</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><strong>ID COMENTARIO:</strong></td>
                    <td><?= isset($See) && is_object($See) ? $See->idCOMENTARIOS : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Producto:</strong></td>
                    <td><?= isset($See) && is_object($See) ? $See->NombreP : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Usuario:</strong></td>
                    <td><?= isset($See) && is_object($See) ? $See->Nombre : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Comentario:</strong></td>
                    <td><?= isset($See) && is_object($See) ? $See->Comentario : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Fecha:</strong></td>
                    <td><?= isset($See) && is_object($See) ? $See->Fecha : "" ?></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php';?>
