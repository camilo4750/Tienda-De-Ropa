<?php require_once 'Views/sidebar.php'; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?=Base_url?>persona/All">Ver tabla</a>
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
                    <td><strong>Nombres:</strong></td>
                    <td><?= isset($Persona) && is_object($Persona) ? $Persona->Nombre : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Apellidos:</strong></td>
                    <td><?= isset($Persona) && is_object($Persona) ? $Persona->Apellidos : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?= isset($Persona) && is_object($Persona) ? $Persona->Email : "" ?></td>
                </tr>

                <tr>
                    <td><strong>Rol:</strong></td>
                    <td><?= isset($Persona) && is_object($Persona) ? $Persona->Rol : "" ?></td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php';?>
