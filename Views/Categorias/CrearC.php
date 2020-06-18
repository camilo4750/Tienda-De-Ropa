<?php require_once 'Views/sidebar.php'; ?>
<!-- Area Chart Example-->
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-success" href="<?= Base_url ?>categoria/crear">Crear</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?= Base_url ?>categoria/gestionar">Ver tabla</a>
        </li>
    </ol>
    <div class="card mb-3">
        <?php if (isset($Edit) && isset($categoria) && is_object($categoria)) : ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Editar <strong><?= $categoria->Nombre ?></strong></div>
            <?php $Accion_url = Base_url . "categoria/save&id=" . $categoria->idCATEGORIAS ?>
        <?php else: ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Crear una nueva categoria
            </div>
            <?php $Accion_url = Base_url . "categoria/save" ?>
        <?php endif; ?>
        <div class="card-body">
            <form action="<?= $Accion_url ?>" method="POST">
                <label>Nombre Categoria</label>
                <input type="text" name="Nombre" class="form-control"
                       value="<?= isset($categoria) && is_object($categoria) ? $categoria->Nombre : false; ?>">
                <button type="submit" class="btn btn-success mt-3">Agregar</button>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php'; ?>
