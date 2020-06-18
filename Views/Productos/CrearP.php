<?php require_once 'Views/sidebar.php'; ?>
<!-- Area Chart Example-->
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-success" href="<?=Base_url?>producto/crear">Crear</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-success" href="<?=Base_url?>producto/gestionar">Ver tabla</a>
        </li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <?php if (isset($Edit) && isset($Datos) && is_object($Datos)) : ?>
            <i class="fas fa-chart-area"></i>
           <strong>Editar <?=$Datos->NombreP?></strong> </div>
           <?php $AccionUrl = Base_url . "producto/save&id=" . $Datos->idPRODUCTOS ?>
<?php else: ?>
<i class="fas fa-chart-area"></i>
            Crear una nueva categoria</div>

            <?php $AccionUrl = Base_url . "producto/save" ?>
<?php  endif; ?>
            
        <div class="card-body">
            <form action="<?=$AccionUrl?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <label>Categoria</label>
                        <?php $categoria = Utilidades::ShowCategorias(); ?>
                        <select class="form-control" name="idCATEGORIAS">
                            <?php while ($Cat = $categoria->fetch_object()) : ?>
                            <option value="<?=$Cat->idCATEGORIAS?>">
                                <?=$Cat->Nombre?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="NombreP" placeholder="Nombre de la prenda" value="<?=isset($Datos) && is_object($Datos) ? $Datos->NombreP : false;?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label>Descripcion</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion de la prenda" value="<?=isset($Datos) && is_object($Datos) ? $Datos->Descripcion : false;?>">
                    </div>
                    <div class="col">
                        <label>Precio</label>
                        <input type="number" class="form-control" name="Precio" placeholder="Precio de la prenda" value="<?=isset($Datos) && is_object($Datos) ? $Datos->Precio : false;?>">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <label>Stock</label>
                        <input type="text" name="Stock" class="form-control" placeholder="Productos en total" value="<?=isset($Datos) && is_object($Datos) ? $Datos->Stock : false;?>">
                    </div>
                    <div class="col">
                        <label>Oferta</label>
                        <input type="text" class="form-control" name="Oferta" placeholder="Nombre de la prenda" value="<?=isset($Datos) && is_object($Datos) ? $Datos->Oferta : false;?>">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <label>Imagen:</label>
                        <?php if (isset($Datos) && !empty($Datos->Imagen)) : ?>
                        <img src="<?=Base_url?>Upload/Imagenes/<?=$Datos->Imagen?>" style="width: 80px; height: 80px;">
                        <?php endif; ?>
                        <input type="file" name="Imagen" class="form-control" placeholder="Imagen de la prenda">

                    </div>
                </div>
                <?php if (isset($Edit)) :?>
                <button type="submit" class="btn btn-warning mt-3" style="margin-left: 500px; width: 150px;">Editar</button>

<?php else: ?>
<button type="submit" class="btn btn-success mt-3" style="margin-left: 500px; width: 150px;">Agregar</button>

<?php endif; ?>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
</div>
<?php require_once 'Views/Layout/footer2.php'; ?>

